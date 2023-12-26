

@extends('dashboard.layouts.app')

@section('title','اضافة مجموعة')

@section('content')
    <div class="container-fluid">
        <div class="header-body ">
            <div class="row align-items-start">
                <div class="col-auto">

                    <!-- Button -->
                    <a href="{{ route('dashboard.groups.index') }}" class="btn btn-block btn-link text-muted">
                        العودة الى المجموعات
                    </a>
                </div>
                <div class="col text-right">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        المجموعات
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        اضافة مجموعة
                    </h1>

                </div>
            </div> <!-- / .row -->
        </div>
        <! ============ Form
        =======================>
        <br>
        @if(session()->has('appleMessage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>حدث خطاء في حساب المطورين:</strong>  {{ session()->get('appleMessage') }}
            <!-- Button -->
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        <div class="col-lg-12 col-md-12" style="direction: rtl">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <!-- Form -->
                    <form class="mb-4" action="{{ route('dashboard.groups.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <input name="page_id" value="new" hidden>
                    <!-- group name -->
                        <div class="form-group">
                            <!-- Label  -->
                            <label>
                                اسم المجموعة
                            </label>
                            <!-- Text -->
                            <small class="form-text text-muted">
                                اسم المجموعة سيظهر للمشتركين
                            </small>

                            <!-- Input -->
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control form-control-prepended @error('name') is-invalid @enderror"
                                       placeholder="مثال: مجموعة 35"
                                       name="name"
                                       value="{{ old('name') }}"
                                >
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-pen"></i>
                                    </div>
                                </div>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>


                        <!-- Divider -->
                        <hr class="mt-4 mb-5">


                        <!-- upload files -->
                        <div class="form-group">

                            <!-- Label -->
                            <label class="mb-1">
                                رفع الملف .p12
                            </label>

                            <!-- Text -->
                            <small class="form-text text-muted">
                                الرجاء رفع ملف .p12 بعد استخراجه من سلسلة المفاتيح
                            </small>

                            <!-- Card -->
                            <div class="card">
                                <div class="card-body">

                                  <div class="upload-single-file">
                                      <input type="file" accept="application/x-pkcs12" name="file_p12">
                                      <p class="message-upload-file">قم بضغط هنا لرفع ملف p12 </p>
                                  </div>

                                    @error('file_p12')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="mt-5 mb-5">

                        <div class="row">
                            <div class="col-12 col-md-6">

                                <!-- Start date -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                        البريد الاكتروني
                                    </label>
                                    <small class="form-text text-muted">
                                        البريد الالكتروني الخاص بحساب الشهادة في موقع مطورين ابل
                                    </small>

                                    <!-- Input -->
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control form-control-prepended @error('apple_email') is-invalid @enderror"
                                               placeholder="مثال: apple@email.com"
                                               name="apple_email"
                                               value="{{ old('apple_email') }}"
                                        >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>

                                        @error('apple_email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror


                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Start date -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                        كلمة المرور
                                    </label>
                                    <small class="form-text text-muted">
                                        كلمة المرور الخاص بحساب الشهادة في موقع مطورين ابل
                                    </small>

                                    <!-- Input -->
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control form-control-prepended @error('apple_password') is-invalid @enderror"
                                               placeholder="**********"
                                               name="apple_password"
                                               value="{{ old('apple_password') }}"
                                        >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock-alt"></i>
                                            </div>
                                        </div>
                                        @error('apple_password')
                                        <div class="invalid-feedback">
                                           {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / .row -->


                        <div class="row">
                            <div class="col-12 col-md-6">

                                <!-- Private project -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        تحديد طريقة تفعيل الحساب
                                    </label>

                                    <!-- Text -->
                                    <small class="form-text text-muted">
                                        الرجاء تحديد طريقة استقبال كود تفعيل الحساب الخاص بك اما عن طريق استلام الكود على الماك الخاص بك او على رسالة sms على الجوال المسجل في الشهادة
                                    </small>

                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-white">
                                            <input type="radio" name="send_code" id="option1" value="1" checked=""> <i class="fe fe-monitor"></i> جهاز الماك
                                        </label>
                                        <label class="btn btn-white">
                                            <input type="radio" name="send_code" id="option2" value="2"> <i class="fe fe-smartphone"></i> رسالة sms
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- / .row -->

                        <!-- Buttons -->
                        <button type="submit" class="btn btn-block btn-primary">
                            تفعيل الحساب
                        </button>

                    </form>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="row">
                        <div class="col-12">

                            <!-- Warning -->
                            <div class="card bg-light border">
                                <div class="card-body">

                                    <!-- Heading -->
                                    <h4 class="mb-3">
                                        <i class="fe fe-alert-triangle"></i> تحذير
                                    </h4>

                                    <!-- Text -->
                                    <p class="small text-muted mb-2">
                                        1- الرجاء التاكد من صحة ملف p12 حتى يتم توقيع التطبيقات بشكل صحيح
                                    </p>
                                    <p class="small text-muted mb-0">
                                        2- الرجاء التاكد من صحة بيانات حساب المطورين وتحديد طريقة استقبال الكود و تفعيل الحساب
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')
    <script>
        $(document).ready(function(){
            $('.upload-single-file input').change(function (e) {
                $('.upload-single-file p').text(" ملف واحد محدد ("+ e.target.files[0].name +")");
            });
        });
    </script>
@endsection
