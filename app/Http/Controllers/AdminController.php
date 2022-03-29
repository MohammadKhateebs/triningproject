<?php

namespace App\Http\Controllers;

use App\model\Branch;
use App\model\Evaluation;
use App\model\Evaluation_text;
use App\model\Installment;
use App\model\Message;
use App\model\Salary;

use App\model\Student;

use App\model\Teacher;
use Carbon\Carbon;
use App\model\Attendance;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is.admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin', compact('bra'));
    }

    public function adminpage()
    {
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('adminpage',compact('bra'));
    }

    protected function getMessage()
    {
        return $message = [
            'firstName.required' => 'الاسم الاول مطلوب',
            'secondName.required' => 'الاسم الثاني مطلوب',
            'thirdName.required' => 'الاسم الثالث مطلوب',
            'lastName.required' => 'الاسم الرابع مطلوب',
            'gender.required' => 'الرجاء اختيار الجنس ',
            'identification.required' => 'رقم الهوية مطلوب',
            'phone.required' => 'رقم الهاتف مطلوب',
            'identification.numeric' => 'رقم الهوية يجب ان يكون ارقام',
            'installments.required' => 'الاقساط مطلوبة',
            'installments.numeric' => 'يجب ان تكون الاقساط ارقام ',
            'phone.numeric' => 'رقم الهاتف يجب ان يكون ارقام',
            'address.required' => 'يرجى ادخال مكان السكن',
            'branch_id.required' => 'يرجى ادخال الشعبه',
            'identification.digits' => 'رقم الهوية 9 ارقام فقط',
            'phone.digits' => 'رقم الهاتف 10 ارقام فقط',
            'birthday.required' => 'تاريخ الميلاد مطلوب',


        ];
    }
    protected function getRules()
    {
        return $rules = [
            'firstName' => 'required',
            'thirdName' => 'required',
            'secondName' => 'required',
            'lastName' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'identification' => 'required|numeric|digits:9',
            'installments' => 'required|numeric',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'branch_id' => 'required',


        ];
    }

    public function storeAjax(Request $request)
    {
        $message = $this->getMessage();
        $rules = $this->getRules();
        //Validation data after insert
        $validator = Validator::make($request->all(), $rules, $message);
            if (!$validator->passes()) {
                return response()->json(['error' => $validator->errors()]);
            }
        $year = date('Y', strtotime($request->birthday));

            if($year!="2017"&&$year!="2016"&&$year!="2015"&&$year!="2018"){
                return response()->json(['errorDate' => 'عمر الطفل غير مناسب ']);
            }
            if($request->installments<100||$request->installments>250){
                return response()->json(['errorinstallments' => 'القسط خارج النظاق المحدد 100:250']);
            }
            else {
                Student::create([
                    'firstName' => $request->firstName,
                    'thirdName' => $request->thirdName,
                    'secondName' => $request->secondName,
                    'lastName' => $request->lastName,
                    'identification' => $request->identification,
                    'gender' => $request->gender,
                    'birthday' => $request->birthday,
                    'address' => $request->address,
                    'phone' => $request->phone,
                    'installments' => $request->installments,
                    'branch_id' => $request->branch_id,
                ]);
                return response()->json(['status' => $request->birthday, 'success' => $request]);
            }

    }



    public function Classrooms()
    {
        $classrooms = Branch::select('id', 'name', 'classroom')->where('delete', 0)->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $student = Student::select('branch_id')->get();
        $teachers = Teacher::select('name', 'branch_id')->get();

        return view('admin.classroom', compact('classrooms', 'student', 'teachers','bra'));
    }
    public function deleteClassroom($id){
        $student=Student::select('branch_id')->where('branch_id',$id)->get();
        if(count($student)>0){
            return back()->with(["fail" => 'لا يمكن حذف شعبة بداخلها طلاب']);
        }
        Branch::where('id', $id)->where('delete', 0)->update(array('delete' => 1));
        return redirect()->back();
    }

    public function addNewBranch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'classroom' => 'required',

        ], ['name.required' => 'اسم الشعبه مطلوب',
            'classroom.required' => 'الصف مطلوب',

        ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $branch=Branch::select('name','classroom','delete')->where('classroom',$request->classroom)->get();
        if(count($branch)>0){
            foreach ($branch as$b){
                if($b->name==$request->name&&$b->delete==0){
                    return response()->json(['errorClassRoom' => 'يوجد شعبه بهذا الاسم']);
                }elseif($b->name==$request->name&&$b->delete==1){
                    return response()->json(['errorClassRoom' => 'يوجد شعبة محذوفة بهذا الاسم, يمكنك استعادتها']);
                }
            }
        }
        else {

            Branch::create([
                'name' => $request->name,
                'classroom' => $request->classroom,
            ]);
            return response()->json(['successes' => 'تم اضافه الشعبه بنجاح']);

        }

    }

    public function deleteStudent($id)
    {
        Student::where('identification', $id)->where('confirmed',1)->where('archives', 0)->update(array('confirmed' => 2));
        return redirect()->back();
    }

    public function firstS()
    {

        $section = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();

        return view('student.first', compact('section','bra'));
    }
    //kg2
    public function secondS()
    {

        $section = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $Students=Student::select('firstName', 'secondName', 'thirdName','created_at', 'lastName', 'gender', 'identification',
            'phone', 'address', 'confirmed', 'active', 'birthday')->where('branch_id',Null)->where('archives',0)->get();

        return view('student.second', compact('section','bra','Students'));
    }
    public function binStudent($id){
        $students=Student::select('firstName', 'secondName', 'thirdName', 'lastName', 'gender', 'identification',
            'phone', 'address', 'confirmed', 'active', 'created_at', 'birthday', 'installments', 'branch_id')
            ->where('branch_id',$id)->where('confirmed',2)->where('archives',0)->get();
        $branch=Branch::select('name','classroom')->where('id',$id)->where('delete',0)->get();
        $classroom=$branch[0]->classroom;
        $nameBranch=$branch[0]->name;
        return view('admin.binStudent',compact('students','nameBranch','id','classroom'));
    }
    public function report($role){

        $students=Student::select('firstName', 'secondName', 'thirdName', 'lastName','identification','installments','confirmed', 'branch_id')
            ->where('archives',0)->get();
        $installments=Installment::select('id','month','term','student_id','receipt','updated_at','installments')->get();
        $branch=Branch::select('id','name','classroom','delete')->where('delete',0)->get();
        $salary=Salary::select('id','month','term','salary','teacher_id')->get();
        $teacher=Teacher::select('name','identification','branch_id','salary','delete')->get();
        return view('admin.report',compact('students','installments','role','branch','salary','teacher'));
    }
    public function reportSt($id){
        $students=Student::select('firstName', 'secondName', 'thirdName', 'lastName','identification','installments','confirmed', 'branch_id')
            ->where('branch_id',$id)->where('archives',0)->get();
        $installments=Installment::select('id','month','term','student_id','receipt','updated_at','installments')->get();
        $branch=Branch::select('name','classroom')->where('id',$id)->get();

        return view('admin.reportSt',compact('students','installments','branch'));
    }
    public function section($id)
    {
        $installments = Installment::select('id', 'month', 'term', 'student_id', 'receipt')->get();
        $br=Branch::select('name')->where('id',$id)->where('delete',0)->get();
        $name=$br[0]->name;
        $section = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $Students = Student::select('firstName', 'secondName', 'thirdName', 'lastName', 'gender', 'identification',
            'phone', 'address', 'confirmed', 'active', 'created_at', 'birthday', 'installments', 'branch_id')
            ->where('branch_id',$id)
            ->where('confirmed', 1)->where('archives', 0)->get();
        return view('section.section', compact('Students', 'id', 'section','installments','name'));

    }

    public function section2($id)
    {$br=Branch::select('name')->where('id',$id)->where('delete',0)->get();
        $name=$br[0]->name;
        $installments = Installment::select('id', 'month', 'term', 'student_id', 'receipt')->get();
        $section = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $Students = Student::select('firstName', 'secondName', 'thirdName', 'lastName', 'gender', 'identification',
            'phone', 'address', 'confirmed', 'active', 'created_at', 'birthday', 'installments', 'branch_id')
            ->where('branch_id',$id)->where('confirmed', 1)->where('archives', 0)->get();
        return view('section.section2', compact('Students', 'id','name', 'section','installments'));

    }

    public function Teachers()
    {
        $Teachers = Teacher::select('name', 'branch_id', 'identification', 'educationLevel', 'phone', 'salary','delete')
            ->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin.AllTeachers', compact('Teachers', 'bra'));
    }
    public function updateBranch(Request $request){
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',], ['branch_id.required' => 'اختر شعبة',]);
        $t = Teacher::select( 'branch_id', 'identification')->where('delete', 0)->get();
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            foreach ($t as $te){
                if($te->branch_id==$request->branch_id){
                    return response()->json(['error_receipt' => "يوجد استاذ مشرف لهذه الشعبة"]);

                }
            }
                Teacher::where('identification', $request->id)->update(array('branch_id' => $request->branch_id));
                return response()->json(['successes' => 'done']);
            }

    }

    public function addteacher(Request $request)
    {
        if (Teacher::where('branch_id', $request->branch_id)->where('delete', 0)->exists()) {
            return response()->json(['uniqueSL' => 'يوجد استاذ لهذا الصف']);
        }
        if ($request->identification == 123456789 ||  Student::where('identification', $request->identification)->where('archives', 0)->exists())
            return response()->json(['errid' => 'رقم الهويه خاطئ او موجود مسبقا']);
        //Validation data after insert
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'identification' => 'required|numeric|digits:9',
            'branch_id' => 'required',
            'password' => 'required|min:8',
            'phone' => 'required|numeric|digits:10',
            'educationLevel' => 'required',
            'salary'=>'required|numeric',
        ], ['name.required' => 'الاسم مطلوب',
            'identification.required' => 'رقم الهويه مطلوب',
            'identification.numeric' => 'رقم الهويه يجب ان يكون ارقام',
            'identification.digits' => 'رقم الهوية 9 ارقام فقط',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.numeric' => 'رقم الهاتف يجب ان يكون ارقام',
            'phone.digits' => 'رقم الهاتف 10 ارقام فقط',
            'educationLevel.required' => 'المستوى التعليمي مطلوب',
            'salary.required'=>'الراتب الشهري مطلوب',
            'salary.numeric'=>'يجب ان يكون الراتب ارقام',
            'branch_id.required' => 'الشعبه الدراسيه مطلوبه',
            'password.required' => 'الرقم السري مطلوب',
            'password.min' => 'الرقم السري يجب ان يكون من 8 ارقام على الاقل',
        ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            if ($request->password_confirm != $request->password) return response()->json(['errconfirm' => 'الرقم السري غير متطابق']);
            Teacher::create([
                'name' => $request->name,
                'identification' => $request->identification,
                'branch_id' => $request->branch_id,
                'educationLevel' => $request->educationLevel,
                'phone' => $request->phone,
                'salary'=>$request->salary,
            ]);
            User::create([
                'userid' => $request->identification,
                'role' => 2,
                'password' => Hash::make($request->password),
                'name' => $request->name,
            ]);
            return response()->json(['successes' => 'تم اضافه المدرس وانشاء الحساب بنجاح']);


        }

    }

//for installments
    public function viewin($id,$ids)
    {
        $CurrentDate = date('Y-m-d');
        $students = Student::select('firstName','lastName', 'identification', 'installments')->where('identification', $id)->get();
        $installments = Installment::select('id', 'month', 'term', 'student_id', 'receipt', 'updated_at')->where('student_id', $id)->get();
        return view('admin.installments', compact('students', 'installments','ids'));
    }

    public function updateReceipt(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'receipt' => 'required|numeric',

        ], ['receipt.required' => 'ادخل مقدار الدفعه',

            'receipt.numeric' => ' يجب ان يكون ارقام',
        ]);
        $installments = Installment::select('id', 'receipt')->where('id', $request->id)->get();

        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            if ($request->receipt+$installments[0]->receipt > $request->installments)
                return response()->json(['error_receipt' => "لا يمكن للمدفوعات ان تتجاوز قيمه القسط وهي " . $request->installments]);
            else {
               $newR=$request->receipt+$installments[0]->receipt;
                Installment::where('id', $request->id)->update(array('receipt' => $newR));
                return response()->json(['successes' => 'done']);
            }
        }
    }

    public function deleteTeacher($id)
    {

        Teacher::where('identification', $id)->where('delete', 0)->update(array('delete' => 1,'branch_id'=>null));

        User::where('userid', $id)->delete();


        if (Message::where('fromId', $id)->exists())
            Message::where('fromId', $id)->delete();
        if (Message::where('toId', $id)->exists())
            Message::where('toId', $id)->delete();
        return redirect()->back();
    }

    public function absenceTeacher()
    {
        $teacher = Teacher::select('name', 'identification', 'branch_id')->where('delete', 0)->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin.absenceTeacher', compact('teacher', 'bra'));
    }

    public function absenceTeacherPost(Request $request)
    {

        $CurrentDate = date('Y-m-d');
        //Validation data after insert
        $validator = Validator::make($request->all(), ['date' => 'required',], ['date.required' => 'التاريخ مطلوب!',]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else if ($request->date > $CurrentDate) {
            return response()->json(['errorNunValue' => 'التاريخ خاطئ']);
        } else {

            $absences = $request->input('absence');

            if (Attendance::where('date', $request->date)->where('archives', 0)->where('role', 2)->exists()) {
                return response()->json(['errorNunValue' => 'لقد تم ادخال الحضور والغياب لهذا التاريخ']);
            } else {

                foreach ($absences as $item) {

                    $teacher = Teacher::select('name')->where('delete', 0)
                        ->where('identification', $item)->get();
                    Attendance::create([
                        'name' => $teacher[0]->name,

                        'identification' => $item,

                        'role' => 2,

                        'date' => \Carbon\Carbon::parse($request->date),

                    ]);
                }


                return response()->json(['successes' => 'done']);


            }
        }
    }

    public function ShowAbsenceTeacher()
    {
        $absence = Attendance::select('name','branch_id','identification','date','archives','id','role')->where('archives', 0)->where('role', 2)->get();
        $teacher = Teacher::select('name', 'identification')->with('branch')->where('delete', 0)->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin.AttendanceTeachers', compact('absence', 'teacher','bra'));

    }

    public function salariesTeacher()
    {
        $teachers = Teacher::select('name', 'identification', 'educationLevel')->where('delete', 0)->get();
       // $salaries = Salary::select('id', 'month', 'term', 'teacher_id', 'salary')->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin.salariesTeacher', compact('teachers','bra'));
    }
    public function addsalary($id){
        $teachers = Teacher::select('name', 'identification', 'educationLevel')->where('delete', 0)->get();
     $salaries = Salary::select('id', 'month', 'term', 'teacher_id', 'salary')->get();
        return view('admin.salary', compact('teachers','salaries','id'));

    }

public function back(){
    $teachers = Teacher::select('name', 'identification', 'educationLevel')->where('delete', 0)->get();
        return view('admin.salariesTeacher',compact('teachers'));
}
    public function addSalaryTeacher(Request $request)
    {
        //  return response()->json(['error' => $request->teacher_id . " " . $request->salary]);
        $validator = Validator::make($request->all(), [
            'term' => 'required',
            'month' => 'required',
            'salary' => 'required|numeric',
        ], ['term.required' => 'يجب تحديد الفصل',
            'month.required' => 'يجب تحديد الشهر',
            'salary.numeric' => 'المرتب يجب ان يكون ارقام',
            'salary.required' => 'الراتب مطلوب',
        ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            $t = Teacher::select('salary')->where('identification', $request->teacher_id)->get();
            $s = Salary::select('term', 'month')->where('teacher_id', $request->teacher_id)->get();
            foreach ($s as $sal) {
                if ($sal->month == $request->month && $sal->term == $request->term) {
                    return response()->json(['error_sal' => 'لقد تم دقع الراتب لهذا الشهر مسبقاً']);
                }
            }
            if ($request->salary != $t[0]->salary)
                return response()->json(['error_sal' => 'يجب ان يكون الراتب المدفوع بمقدار' . $t[0]->salary]);
            Salary::create([
                'term' => $request->term,
                'month' => $request->month,
                'teacher_id' => $request->teacher_id,
                'salary' => $request->salary,

            ]);

            return response()->json(['successes' => 'تم اضافه راتب المدرس بنجاح']);


        }


    }

//for unstallments
    public function addinstallment(Request $request)
    {
        $installments = Installment::select('id', 'month', 'term', 'student_id', 'receipt')->where('student_id', $request->student_id)->get();

        $validator = Validator::make($request->all(), [
            'term' => 'required',
            'month' => 'required',
            'receipt' => 'required|numeric',
        ], ['term.required' => 'يجب تحديد الفصل',
            'month.required' => 'يجب تحديد الشهر',
            'receipt.numeric' => 'الدفعة يجب ان تكون ارقام',
            'receipt.required' => 'الدفعة مطلوبة',
        ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {

            foreach ($installments as $i) {
                if ($i->term == $request->term && $i->month == $request->month) {
                    return response()->json(['errorNunValue' => 'لقد تم دفع هذا الشهر مسبقاً']);
                }
            }

            Installment::create([
                'term' => $request->term,
                'month' => $request->month,
                'student_id' => $request->student_id,
                'receipt' => $request->receipt,
                'installments'=>$request->installments,

            ]);

            return response()->json(['successes' => 'تم اضافه راتب المدرس بنجاح']);


        }
    }
    public function showAttendanceStudent()
    {
        $absence = Attendance::select('name','branch_id','identification','date','archives','id','role')->where('archives', 0)->where('role', 1)->get();
        $students = Student::select('firstName', 'secondName', 'lastName', 'identification', 'branch_id')->where('archives', 0)->get();
        $section = Branch::select('id', 'classroom', 'name')->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin.Attendance', compact('absence', 'students','section','bra'));

    }
    public function showAttendanceStudent32($id)
    {

        $role = 4;
        $absence = Attendance::select('name','branch_id','identification','date','archives','id','role')->where('archives', 0)->where('role', 1)->get();
        $students = Student::select('firstName', 'secondName', 'thirdName', 'lastName', 'gender', 'identification',
            'phone', 'address', 'branch_id', 'confirmed', 'active', 'created_at', 'birthday', 'installments', 'branch_id')->where('confirmed', 1)->where('archives', 0)->get();
        $section = Branch::select('id', 'classroom', 'name')->get();
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        return view('admin.AttendanceStudent', compact('absence', 'students', 'role','section','bra','id'));

    }


    public function showEvaluationStudent($cr)
    {

        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->where('classroom',$cr)->get();
        $evaluation = Evaluation::select( 'id','branch_id','student_id','term','month','note','eval_ar','eval_en','eval_math','eval_deen')->where('archives', 0)->get();
        $students = Student::select('firstName', 'lastName', 'identification', 'branch_id')->where('archives', 0)->get();
        return view('admin.Evaluation', compact('evaluation', 'students','bra','cr'));

    }
    public function evalStudent($id,$cr){
        $bra = Branch::select('id', 'name', 'classroom')->where('delete',0)->get();
        $Student=Student::select('firstName', 'lastName', 'identification', 'branch_id')->where('identification',$id)->where('archives', 0)->get();
        $evaluations=Evaluation::select( 'id','branch_id','student_id','term','month','note','eval_ar','eval_en','eval_math','eval_deen')
            ->where('student_id',$id)->where('archives', 0)->get();
        return view('admin.evalstudent',compact('Student','evaluations','cr','bra'));

    }
    public function ArchiveStudent($id){
        Student::where('identification',$id)->where('archives',0)->update(['archives'=>1]);
        return redirect()->back();
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['userid' => 'required', 'password' => 'required|min:8|confirmed'],
            ['userid.required' => 'رقم الهوية مطلوب',
                'password.required' => 'يرجى ادخال الرقم السري',
                'password.confirmed' => 'تاكيد الرقم السري خاطئ',
                'password.min' => 'يجب ان يتكون من 8 احرف وارقام على الاقل',
            ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            if (!User::where('userid', '=', $request->userid)->where('archives', 0)->exists()) {
                return response()->json(['errorID' => 'رقم الهويه غير صحيح']);
            }
            if (User::where('userid', '=', $request->userid)->where('role', 1)->where('archives', 0)->exists()) {
                return response()->json(['errorID' => 'رقم الهويه غير صحيح']);
            }
            User::where('userid', '=', $request->userid)->where('archives', 0)->update(array('password' => Hash::make($request->password)));
            return response()->json(['done' => ' لقد تم تغيير كلمه السر بنجاح للمستخدم :' . $request->userid]);
        }

    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['userid' => 'required', 'password' => 'required|min:8|confirmed'],
            ['userid.required' => 'رقم الهوية مطلوب',
                'password.required' => 'يرجى ادخال الرقم السري',
                'password.confirmed' => 'تاكيد الرقم السري خاطئ',
                'password.min' => 'يجب ان يتكون من 8 احرف وارقام على الاقل',
            ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            if ($request->userid != $request->user) {
                return response()->json(['errorID' => 'رقم الهويه خاطئ']);
            }
            User::where('userid', '=', $request->userid)->where('archives', 0)->update(array('password' => Hash::make($request->password)));
            return response()->json(['done' => ' لقد تم تغيير كلمه السر الخاصه بك بنجاح']);
        }

    }


    public function archivesData()
    {
        $branch=Branch::select('id','classroom')->where('delete',0)->get();
        $student=Student::select('identification','branch_id')->where('archives',0)->get();
        foreach ($student as $s){
            foreach ($branch as $b){
                if($s->branch_id==$b->id){
                    if($b->classroom=='kg1'){

                        Student::where('identification',$s->identification)->where('archives',0)->update(['branch_id'=>Null]);
                } elseif ($b->classroom=='kg2'){
                    Student::where('identification',$s->identification)->increment('archives');
                }
        }}
        }
        Salary::increment('archives');
        Installment::increment('archives');
        Evaluation::increment('archives');
        Attendance::increment('archives');
        User::where('role', 4)->delete();
        Message::where('seen', 1)->delete();
        Message::where('seen', 0)->delete();
        return redirect()->back();

    }
    public function updatestudentb (Request $request){
        $validator = Validator::make($request->all(), [
            'branch_id' => 'required',
            'installments' => 'required',
        ], ['receipt.required' => 'اختر الشعبه',
            'installments.required' => ' ادخل القسط الشهري',
        ]);
        if (!$validator->passes()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
                Student::where('identification', $request->id)->update(array('installments' => $request->installments,'branch_id'=>$request->branch_id));
                return response()->json(['successes' => 'done']);
        }
    }

    public function toArchives($role)
    {
        if ($role == 4) {

            $students = Student::select('firstName', 'thirdName', 'secondName', 'lastName', 'identification')
                ->where('archives', '>', 0)->orderBy('identification')->get();

            return view('admin.archives', compact('students', 'role'));
        }

    }

    public function showArchive($id, $role)
    {


            $student = Student::select('firstName', 'thirdName', 'secondName', 'lastName', 'gender', 'identification',
                'phone', 'address', 'branch_id', 'teacher', 'archives')->orderBy('archives')
                ->where('identification', $id)->get();
            $numberPrograms = count($student);
            $attend = Attendance::select('identification', 'date', 'archives')->orderBy('archives')
                ->where('role', 4)->where('identification', $id)->get();
            $evaluation = Evaluation::select('identification', 'date', 'evaluation', 'archives')
                ->orderBy('archives')->where('to', 4)->where('identification', $id)->get();
            return view('admin.detailsArchives', compact('role',  'student', 'numberPrograms', 'attend', 'evaluation'));



    }
    public function Bin($role)
    {

        if ($role == 4) {


                $Students = Student::select('firstName', 'thirdName', 'secondName', 'lastName', 'gender', 'identification',
                    'phone', 'address','branch_id' )
                    ->where('archives', 0)->where('confirmed', 2)->get();
                return view('admin.bin', compact('Students',  'role'));

        }
        elseif ($role == 2) {
            $teachers = Teacher::select('name','identification','delete','educationLevel','phone','branch_id','salary')->where('delete', '>', 0)->get();

            return view('admin.bin', compact('teachers',  'role'));
        }
        elseif ($role==1){
            $classroom = Branch::select('id', 'classroom', 'name')->where('delete',1)->get();
            return view('admin.bin', compact('classroom',  'role'));
        }

    }


    public function recovery($role, $id)
    {
        if ($role == 4) {

                if (Student::where('identification', $id)->where('confirmed', 2)->exists()) {
                    Student::where('identification', $id)->where('confirmed',2)->update(array('confirmed' => "1"));
                    return back()->with(["successd" => 'تمت الاستعاده']);
                }

        } elseif ($role == 1) {
            if (Branch::where('id', $id)->where('delete', 1)->exists()) {
                Branch::where('id', $id)->where('delete',  1)->update(array('delete' => "0"));
                return back()->with(["successd" => 'تمت الاستعاده']);
            }
        }
        elseif ($role==2){
            if (Teacher::where('identification', $id)->where('delete', 1)->exists()) {

                Teacher::where('identification', $id)->where('delete',  1)->update(array('delete' => "0"));
                return back()->with(["successd" => 'تمت الاستعاده']);
            }
        }
    }


}

