 @extends('Main_layout')
 @section('title')
     تعديل طالب جديد
 @endsection

 @section('content')
     @if (Session::has('error'))
         <div class="alert alert-error" role="alert">
             {{ Session::get('error') }}
         </div>
     @endif

     <div class="col-md-12">
         <form method="POST" enctype="multipart/form-data" action="{{ route('student.update',$data['id']) }}" role="form"
             style="width: 80%; margin: 0 auto;background-color: white">
             @csrf
             <div class="card-body">
                 <div class="form-group">
                     <label for="name">اسم الطالب</label>
                     <input autofocus type="text" name="name" class="form-control" id="name"
                         value="{{ old('name',$data['name']) }}">
                     @error('name')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                 </div>

                 <div class="form-group">
                     <label> الدولة التابع لها الطالب </label>
                     <select name="country_id" id="country_id" class="form-control" >
                         <option value="">اختر الدولة</option>
                         @if (!@empty($countries))
                         @foreach ($countries as $info )
                           <option value="{{ $info->id }}" @if(old('country_id',$data['country_id']==$info->id)) selected @endif > {{ $info->name }} </option>
                         @endforeach
                         @endif
                     </select>
                     @error('active')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                 </div>

                  <div class="form-group">
                     <label for="nationalID">الرقم القومي للهوية</label>
                     <input  type="text" name="nationalID" class="form-control" id="nationalID" value="{{ old('nationalID',$data['nationalID']) }}">
                     @error('nationalID')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                     </div>

                 <div class="form-group">
                     <label for="phone">الهاتف</label>
                     <input  type="text" name="phone" class="form-control" id="phone" value="{{ old('phone',$data['phone'])}}">
                     @error('phone')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                     </div>


                 <div class="form-group">
                     <label for="address">العنوان</label>
                     <input  type="text" name="address" class="form-control" id="address" value="{{ old('address',$data['address']) }}">
                     </div>

                      <div class="form-group">
                     <label for="notes">ملاحظات</label>
                     <input  type="notes" name="notes" class="form-control" id="notes" value="{{ old('notes',$data['notes']) }}">
                     </div>


                 <div class="form-group">
                     <label> حالة التفعيل</label>
                     <select name="active" id="active" class="form-control">
                         <option value="">اختر الحالة</option>
                         <option value="1" @if (old('active',$data['active']) == 1) selected @endif> مفعل</option>
                         <option value="0" @if (old('active',$data['active']) == 0) selected @endif> معطل</option>
                     </select>
                     @error('active')
                         <span style="color: red">{{ $message }}</span>
                     @enderror
                 </div>

                   <div class="form-group">
                     <label for="photo"> قم بارفاق صورة في حال تريد تغيرها</label>
                     <img src="{{ asset('uploads/'.$data['image'])}}" style="width:200px; height:200px;"><br><br>
                     <input  type="file" name="photo" class="form-control" id="photo">
                     </div>

                 <div class="form-group" style="text-align: center">
                     <button type="submit" style="margin-right: " class="btn btn-primary">تعديل الطالب</button>
                 </div>
             </div>


         </form>
     </div>
 @endsection

