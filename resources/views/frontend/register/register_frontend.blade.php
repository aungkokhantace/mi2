@extends('layouts_frontend.master_frontend')
@section('title','Register Page')
@section('content')
    {{--{!! $page->content !!}--}}
    <div class="col-md-9 right">
        {{--{!! generateSlider() !!}--}}

        {{--Start Slider View--}}
        <!-- Carousel & header section -->
        <div class="slider-header slider-image col-md-2">
            <img style="height:66px !important;" src="/images/Slider_logo.png" alt="">
        </div>
        <div class="slider-header col-md-10">
            18th Myanmar Internal Medicine Conference (MIMC) 2017<br>
            [In conjunction with 4th AFIM Congress and<br>
            4th ACP South East Asian Chapter Meeting]
        </div>
        <!-- Carousel Slider Part -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                @if(isset($images) && count($images)>0)
                    @foreach($images as $k=>$image)
                        <div class="item @if($k == 0) active @endif">
                            <img src="/{{$image->image_url}}" alt="Image">
                        </div>
                    @endforeach
                @else
                    <div class="item active">
                        <img src="/images/aceplus_logo.png" alt="Image">
                    </div>
                @endif
            </div>
            <!-- Controls -->
            {{--<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">--}}
            {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">--}}
            {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
            {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        </div>
        <!-- end of Carousel & header section -->
        <br>
        {{--End Slider View--}}

        <br>

        <h2 class="">{{'Register Entry' }}</h2>

        {!! Form::open(array('id'=> 'frm_register' , 'url' => '/register/store', 'class'=> 'form-horizontal user-form-border')) !!}
        {{ csrf_field() }}
        <input type="hidden" name="events_id" value="1"/>
        <br/>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="first_name">First Name<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{Request::old('first_name') }}"/>
                <p class="text-danger" id="first_name_error">{{$errors->first('first_name')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="middle_name">Middle Name</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name" value="{{Request::old('middle_name') }}"/>
                <p class="text-danger">{{$errors->first('middle_name')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="last_name">Last Name<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{Request::old('last_name') }}"/>
                <p class="text-danger" id="last_name_error">{{$errors->first('last_name')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="title">Title</label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{Request::old('title') }}"/>
                <p class="text-danger">{{$errors->first('title')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="email">Email<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{Request::old('email') }}"/>
                <p class="text-danger" id="email_error">{{$errors->first('email')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="country">Country<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select class="form-control" name="country" id="country">
                    <option value="" selected disabled>Select Country</option>
                    @foreach($countries as $key=>$value)
                        <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
                <p class="text-danger" id="country_error">{{$errors->first('country')}}</p>
            </div>
        </div>

        {{--<div class="row entry_row">--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
                {{--<label for="where_work">Where you work<span class="require">*</span></label>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">--}}
                {{--<input type="text" class="form-control" id="where_work" name="where_work" placeholder="Enter where you work" value="{{Request::old('where_work') }}"/>--}}
                {{--<p class="text-danger" id="where_work_error">{{$errors->first('where_work')}}</p>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="medical_specialities">Medication Specialities<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select class="form-control" name="medical_specialities" id="medical_specialities" onchange="check_for_other();">
                    @foreach($specialitiesArr as $key=>$specialities)
                        @if($key == "main_speciality")
                            @foreach($specialities as $mainSpeciality)
                                <option value="{{$mainSpeciality->id}}">{{$mainSpeciality->name}}</option>
                            @endforeach
                        @else
                            <optgroup label="{{$key}}">
                                @foreach($specialities as $subSpeciality)
                                    @if($subSpeciality->option_group_name == $key)
                                        <option value="{{$subSpeciality->id}}" style="margin-left:20px;">{{$subSpeciality->name}}</option>
                                    @endif
                                @endforeach
                            </optgroup>
                        @endif
                    @endforeach
                    <option value="other">Other</option>
                </select>
                <p class="text-danger" id="medical_specialities_error">{{$errors->first('medical_specialities')}}</p>
            </div>
        </div>

        <div class="other row entry_row" style="display: none;">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="other">Other Speciality<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="other" name="other" placeholder="Enter Other Speciality Text" value="{{Request::old('other') }}"/>
                <p class="text-danger" id="other_error">{{$errors->first('other')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="phone_no">Phone no<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone no" value="{{Request::old('phone_no') }}"/>
                <p class="text-danger" id="phone_no_error">{{$errors->first('phone_no')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="registration_category">Registration Category<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select class="form-control" name="registration_category" id="registration_category">
                    <option value="" selected disabled>Select Registration Category</option>
                    {{--<option value="1">International Delegate</option>--}}
                    {{--<option value="2">Local Delegate</option>--}}
                    {{--<option value="3">Local Trainee</option>--}}
                    @foreach($registrationCategories as $registrationCategory)
                        <option value="{{$registrationCategory->id}}">{{$registrationCategory->name}}</option>
                    @endforeach
                </select>
                <p class="text-danger" id="registration_category_error">{{$errors->first('registration_category')}}</p>
            </div>
        </div>

        <div class="row entry_row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <label for="payment_type">Payment Type<span class="require">*</span></label>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <select class="form-control" name="payment_type" id="payment_type" onchange="check_for_bank_transfer();">
                    <option value="" selected disabled>Select Payment Type</option>
                    <option value="1">Cash</option>
                    <option value="2">Bank Transfer</option>
                </select>
                <p class="text-danger" id="payment_type_error">{{$errors->first('payment_type')}}</p>
            </div>
        </div>

        <div class="bank_acc_info row entry_row" style="display: none;">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                {{--<p class="bank_account_no">Account  -0107101200004456 (Name – internal medicine society)</p>--}}
                <p class="bank_account_no">Foreign Account  -  0107101200004456</p>
                <p class="bank_account_no">Local Account  -  0107100400000108</p>
                <div class="bank_acc_detail">
                    <p>
                    Co-operative Bank Ltd. (CB Bank)<br>
                    Myanmar Plaza Branch<br>
                    Room No G24, Myanmar Plaaza, Gabar Aye Pagoda Road,<br>
                    Bahan Township, Yangon, Myanmar<br>
                    Swift Code CPOBMMMY<br>
                    Tel (95-9) 73018809, (95-9) 731180241<br>
                    Fax (95-9) 732 19446, (95-9) 73223426<br>
                    E-mail myanmarplazabranch@cbbank.com.mm
                    </p>
                </div>
                <br>
                <p>
                    You need to send scanned document of payment for registration fee via mail. (eg- cash receipt, deposit slip or transfer slip)
                </p>
            </div>
        </div>
        <br>

        <div class="row entry_row">
            {{--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">--}}
            {{--</div>--}}
            <!--  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
            <input type="submit" name="submit" value="ADD" class="form-control btn-primary">
        </div> -->

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4" style="margin-right:10px;">
                {{--<button type="button" onclick="pre_add_confirm_setup();" class="form-control btn-primary button-type">--}}
                    {{--SUBMIT--}}
                {{--</button>--}}
                <button type="button" class="form-control btn btn-primary" onclick="pre_add_confirm_setup();">SUBMIT</button>
            </div>

            <!--  -->
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                {{--<a href="/home/register"><button type="button" value="CANCEL" class="form-control cancel_btn button-type" onclick="">CANCEL</button></a>--}}
                <a href="/home/register"><button type="button" class="form-control btn btn-primary cancel_btn frontend-cancel">CANCEL</button></a>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop


@section('page_script')
    <script src="/assets/js/utils.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $(".other").hide();
        });

        function pre_add_confirm_setup(){

            var valid = true;

            $("#first_name_error").text("");
            var first_name = $("#first_name").val();
            if(first_name == "" || first_name == "undefined"){
                $("#first_name_error").text("First Name is required !");
                valid = false;
            }

            $("#last_name_error").text("");
            var last_name = $("#last_name").val();
            if(last_name == "" || last_name == "undefined"){
                $("#last_name_error").text("Last Name is required !");
                valid = false;
            }

            $("#email_error").text("");
            var email = $("#email").val();
            if(email == "" || email == "undefined"){
                $("#email_error").text("Email is required !");
                valid = false;
            }
            else{
                var validEmail = ValidateEmail(email);
                if(validEmail == false){
                    $("#email_error").text("Email is Invalid !");
                    valid = false;
                }
            }

            $("#country_error").text("");
            var country = $("#country").val();
            if(country == "" || country == "undefined" || country == null){
                $("#country_error").text("Country is required !");
                valid = false;
            }

//            $("#where_work_error").text("");
//            var where_work = $("#where_work").val();
//            if(where_work == "" || where_work == "undefined"){
//                $("#where_work_error").text("Where You Work is required !");
//                valid = false;
//            }

            $("#medical_specialities_error").text("");
            var medical_specialities = $("#medical_specialities").val();
            if(medical_specialities == "" || medical_specialities == "undefined"){
                $("#medical_specialities_error").text("Medical Specialities is required !");
                valid = false;
            }

            //to check whether user selects "other" in medical specialities //if so, validate other text box
            var other_flag = document.getElementById('medical_specialities').value;
            if(other_flag == "other"){
                $("#other_error").text("");
                var other = $("#other").val();
                if(other == "" || other == "undefined"){
                    $("#other_error").text("Other Speciality Text is required !");
                    valid = false;
                }
            }

            $("#phone_no_error").text("");
            var phone_no = $("#phone_no").val();
            if(phone_no == "" || phone_no == "undefined"){
                $("#phone_no_error").text("Phone No. is required !");
                valid = false;
            }

            $("#registration_category_error").text("");
            var registration_category = $("#registration_category").val();
            if(registration_category == "" || registration_category == "undefined" || registration_category == null){
                $("#registration_category_error").text("Registration Category is required !");
                valid = false;
            }

            $("#payment_type_error").text("");
            var payment_type = $("#payment_type").val();
            if(payment_type == "" || payment_type == "undefined" || payment_type == null){
                $("#payment_type_error").text("Payment Type is required !");
                valid = false;
            }

            if(valid == true){
                add_confirm_setup('register');
            }

        }

        function check_for_other(){
            var other_flag = document.getElementById('medical_specialities').value;
            if(other_flag == "other"){
                $(".other").show();
            }
            else{
                $(".other").hide();
            }
        }

        function check_for_bank_transfer(){
            var flag = document.getElementById('payment_type').value;
            if(flag == 2){
                $(".bank_acc_info").show();
            }
            else{
                $(".bank_acc_info").hide();
            }
        }

    </script>
@stop