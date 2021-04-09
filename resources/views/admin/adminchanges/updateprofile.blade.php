@extends('admin.layouts.admin_layout')

@section('content')

   
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      @include('admin.includes.flashmessage')
        <div class="row">
          <!-- left column --> 
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin Details </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route($routeName.'update') }}" method="POST" >
              @csrf
              @method('PUT')
                <div class="card-body">

                <div class="form-group">
                    <label class = "require-input">Name</label>
                    <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{ old('name',$user->name) }}">
                    @error('name')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                  
                  </div>




                  <div class="form-group">
                    <label class = "require-input">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email', $user->email)}}">
                    @error('email')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                  
                  </div>


                   
                  <div class="form-group">
                    <label class = "require-input">Date Of Birth</label>
                    <input type="date" name="dob" class="form-control" value="{{ $user->dob}}"  >
                  
                    @error('dob')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror</div>




                 
                </div> 
                <!-- /.card-body -->
                  <div class="card-footer"> 
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div> 
            <!-- /.card -->
            </div>
          
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div> 
      <!-- /.container-fluid -->
    </section> 
    <!-- /.content -->
@endsection 

@section('script')

<style>.require-input:after {
font-weight: bold;
color: red;
content: " *";
}</style>
<!-- jquery-validation -->
<script src="{{ url('admin_assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ url('admin_assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>


<script type="text/javascript">
$(document).ready(function () {
//   $.validator.setDefaults({
//     submitHandler: function () {
//       alert( "Form successful submitted!" );
//     }
  });
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      dob: {
        required: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
      
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6 characters long"
      },
     
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

</script>

@endsection