<?php

namespace App\Http\Controllers;


use App\model\Attendance;
use App\model\Branch;
use App\model\Evaluation;
use App\model\Evaluation_text;
use App\model\Message;
use App\model\Student;
use Illuminate\Http\Request;
use App\model\Teacher;

use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $student=Student::select('firstName','lastName','branch_id')->where('archives',0)->where('identification',$id)->get();

        $absence=Attendance::select('name','branch_id','identification','date','archives','id')->where('archives',0)->where('identification',$id)->get();
        $evaluation=Evaluation::select('id','branch_id','student_id','term','month','note','eval_ar','eval_en','eval_math','eval_deen','student_id')->where('archives',0)->where('branch_id',$student[0]->branch_id)->get();
        $t=Teacher::select('name','identification')->where('branch_id',$student[0]->branch_id)->get();
        $teacher=$t[0]->name;
        $teacherID=$t[0]->identification;
        $messages = Message::orderBy('created_at')->get();

        $noti=0;
        for($i=0;$i<count($messages);$i++){
            if($messages[$i]->fromId==$teacherID&&$messages[$i]->toId==$id){

                if($messages[$i]->seen==0){
                    $noti=1;
                    break;
                }}

        }
        return view('home',compact('absence',"evaluation",'teacher','teacherID','id','messages','noti'));

    }
    public function evlauationforstudent($id){
        $bra = Branch::select('id', 'name', 'classroom')->get();
        $Student=Student::select('firstName', 'lastName', 'identification', 'branch_id')->where('identification',$id)->where('archives', 0)->get();
        $evaluations=Evaluation::select( 'id','branch_id','student_id','term','month','note','eval_ar','eval_en','eval_math','eval_deen')
            ->where('student_id',$id)->where('archives', 0)->get();
        return view('student.evalstudent',compact('Student','evaluations','id','bra'));

    }
    public function sendMessageStudent(Request $request){
        $message = $this->getMessage();
        $rules = $this->getRules();
        //Validation data after insert

        $validator = Validator::make($request->all(), $rules, $message);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {

            Message::create([
                'fromRole'=>4,
                'toRole'=>2,
                'fromId'=>$request->fromId,
                'toId'=>$request->toId,
                'text'=>$request->text,
            ]);
            return response()->json(['done' => $request->text]);
        }

    }

    protected function getMessage()
    {
        return $message = [
            'text.required' => 'نص الرساله فارغ!',

        ];
    }

    protected function getRules()
    {
        return $rules = [
            'text' => 'required',
        ];
    }
    public function updateSeenMessageStudent(Request $request){

        $messages=Message::select('seen','toId')->get();
        foreach ($messages as $message){
            Message::where('toId',$request->id)->where('seen',0)->update(array('seen'=>1));

        }
        return response()->json(['done' => 'done']);
        //Volunteer::where('identification', $request->permissionEvaluation)->update(array('permissionEvaluation' => 1));
    }
    public function changePasswordS(Request $request){
        $validator = Validator::make($request->all(),
            ['userid' => 'required','password' => 'required|min:8|confirmed'],
            [ 'userid.required' => 'رقم الهوية مطلوب',
                'password.required' => 'يرجى ادخال الرقم السري',
                'password.confirmed' => 'تاكيد الرقم السري خاطئ',
                'password.min' => 'يجب ان يتكون من 8 احرف وارقام على الاقل',
            ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            if($request->userid!=$request->user){
                return response()->json(['errorID' => 'رقم الهويه خاطئ']);
            }
            User::where('userid', '=', $request->userid)->where('archives',0)->update(array('password'=>Hash::make($request->password)));
            return  response()->json(['done' => ' لقد تم تغيير كلمه السر الخاصه بك بنجاح']);
        }

    }
}
