<?php

namespace App\Http\Controllers;

use App\model\Attendance;
use App\model\Course;
use App\model\Evaluation;
use App\model\Evaluation_text;
use App\model\Student;
use App\model\Message;
use App\model\Teacher;
use App\model\Volunteer;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
class TecharController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is.techar');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index($id)
    {
        $teacherStudyL=Teacher::select( 'name','branch_id','identification')->where('delete',0) ->where('identification', $id)->get();

        $BID=$teacherStudyL[0]->branch_id;
        $evaluations=Evaluation::select('id','branch_id','student_id','term','month','note','eval_ar','eval_en','eval_math','eval_deen','student_id')->where('archives',0)->where('branch_id',$BID)->get();
        $messages = Message::orderBy('created_at')->get();
        $Students=Student::select('firstName','secondName','lastName','identification','branch_id')->where('archives',0)->where('branch_id',$BID)->get();
        $notiSt=0;$notiVolnu=0;
        foreach ($messages as $message){
            if($message->toId==$id&&$message->fromRole==4){
                if($message->seen==0){
                    $notiSt=1;
                }
            }else if($message->toId==$id&&$message->fromRole==3){
                if($message->seen==0){
                    $notiVolnu=1;
                }
            }
            if( $notiSt==1&&$notiVolnu==1){
                break;
            }

        }
        $eval_text=Evaluation_text::select('evaluation','role')->get();

        return view('teacher',compact('Students','evaluations','BID','id','messages','notiSt','notiVolnu','eval_text'));
    }
    public function attendanceAbsence($id, $idt)
    {

        $absen = Attendance::select('name', 'branch_id', 'identification', 'date','id')->where('archives',0)->where('identification', $id)->get();
        $Student = Student::select('firstName', 'lastName')->where('archives',0)->where('identification', $id)->get();

        return view('Teacher.attendanceAbsence', compact("id", 'absen', 'Student', 'idt'));
    }
    public function attendance(Request $request){

        $CurrentDate=date('Y-m-d');
        //Validation data after insert
        $validator = Validator::make($request->all(), ['date' => 'required',],['date.required' => 'التاريخ مطلوب!',]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else if ( $request->date>$CurrentDate){ return response()->json(['errorNunValue' => 'التاريخ خاطئ']);
        } else {

            $absences = $request->input('absence');
            if (Attendance::where('date', $request->date)->where('archives',0)->where('branch_id', $request->branch_id)->exists()) {
                return response()->json(['errorNunValue' => 'لقد تم ادخال الحضور والغياب لهذا التاريخ']);
            } else {
                foreach ($absences as $item) {
                    $student = Student::select('firstName', 'lastName') ->where('archives',0)
                        ->where('identification', $item)->get();
                    Attendance::create([
                        'name' => $student[0]->firstName . " " .$student[0]->secondName. " ".$student[0]->lastName,
                        'branch_id' => $request->branch_id,
                        'identification' => $item,
                        'date' => \Carbon\Carbon::parse($request->date),
                    ]);
                }
                return response()->json(['successes' => 'done']);
            }
        }
    }

    public function deleteAttendance( $id)
    {
        $a=Attendance::select('branch_id')->where('id', $id)->where('archives',0)->get();
        $t=Teacher::select('identification')->where('branch_id',$a[0]->branch_id)->get();
        Attendance::where('id', $id)->where('archives',0)->delete();
        return redirect('attendanceAbsence/'.$id.'/'.$t[0]->identification );
    }

    protected function getMessage()
    {
        return $message = [
            'term.required' => 'الفصل مطلوب!',
            'month.required' => 'الشهر مطلوب!',
            'eval_ar.required' => 'تقييم اللغة العربية مطلوب!',
            'eval_en.required' => 'تقييم اللغة الانجليزية مطلوب!',
            'eval_math.required' => 'تقييم الرياضيات مطلوب!',
            'eval_deen.required' => 'تقييم التربية الدينية مطلوب!',
            'note.required' => 'الملاحظات مطلوبة!',
        ];
    }

    protected function getRules()
    {
        return $rules = [
            'term' => 'required',
            'month' => 'required',
            'eval_ar' => 'required',
            'eval_en' => 'required',
            'eval_math' => 'required',
            'eval_deen' => 'required',
            'note' => 'required',

        ];
    }

    //create evaluation
    public function evaluation(Request $request)
    {
        $message = $this->getMessage();
        $rules = $this->getRules();
        $validator = Validator::make($request->all(),$rules,$message);

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else{
            $eval=Evaluation::select('student_id','term','month')->where('archives',0)->where('student_id',$request->student_id)->get();
            if (count($eval)>0){
                foreach ($eval as $e)
                    if($request->term==$e->term&&$request->month==$e->month){
                        return response()->json(['errorEval' => 'لقد تم الادخال مسبقا']);
                    }}
            Evaluation::create([
                'branch_id' => $request->Bid,
                'student_id' => $request->student_id,
                'month' => $request->month,
                'term' => $request->term,
                'note' =>  $request->note,
                'eval_ar' => $request->eval_ar,
                'eval_en' => $request->eval_en,
                'eval_math' => $request->eval_math,
                'eval_deen' => $request->eval_deen,
            ]);
            return  response()->json(['done' => 'done']);
        }
    }

    //Show Evaluation
    public function evaluationShow($id,$idt)
    {
        $evaluations = Evaluation::select('id','branch_id','term','month','note','eval_ar','eval_en','eval_math','eval_deen','student_id')->where('archives',0)->where('student_id', $id)->get();
        $Student = Student::select('firstName', 'thirdName', 'secondName', 'lastName','branch_id')->where('archives',0)->where('identification', $id)->get();
        return view('Teacher.evaluation', compact(  'evaluations', 'Student','idt'));
    }

    public function deleteEval($id){
        $ev=Evaluation::select('branch_id','student_id')->where('id',$id)->get();
        $t=Teacher::select('identification')->where('branch_id',$ev[0]->branch_id)->get();

        Evaluation::where('id',$id)->where('archives',0)->delete();
        return redirect('evaluation/'.$ev[0]->student_id.'/'.$t[0]->identification );
    }
    public function sendMessage(Request $request){

        if ($request->text==null||$request->text==" ") {
            return response()->json(['error' => 'نص الرساله فارغ!']);
        } else {

            Message::create([
                'fromRole'=>2,
                'toRole'=>$request->toRole,
                'fromId'=>$request->fromId,
                'toId'=>$request->toId,
                'text'=>$request->text,
            ]);
            return response()->json(['done' => $request->text]);
        }

    }
    public function updateSeenMessageTeacher(Request $request){

        $messages=Message::select('seen','toId','fromId')->get();
        foreach ($messages as $message){
            Message::where('toId',$request->id)->where('fromId',$request->fromId)->where('seen',0)->update(array('seen'=>1));

        }
        return response()->json(['done' => 'done']);

    }

    public function changePasswordT(Request $request){
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
