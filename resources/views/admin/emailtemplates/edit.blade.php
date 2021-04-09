@extends('admin.layouts.admin_layout')

@section('content')


   
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.includes.breadcrumbs',['title'=>$pageName, 'breadCrumbs'=>$breadCrumbs])
    <!-- Main content -->
    <section class="content">
    
        <div class="row">
          <!-- left column --> 
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Email Template </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route($routeName.'update', $emailtemplate->id) }}" method="POST" >
              @csrf
              @method('PUT')
                <div class="card-body">

                <div class="form-group">
                    <label class = "require-input">Subject</label>
                    <input type="text" name="subject" class="form-control"  placeholder="Enter subject" value="{{ old('subject', $emailtemplate->subject)}}">
                    @error('subject')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                  
                  </div>

                  

                    <div class="form-group">
                    <label class = "require-input">Parameters</label>
                    <div class="mb-3">
                    <textarea class="textarea"  name="params" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('params', $emailtemplate->params)}}</textarea>
                    </div>
                    @error('params')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                  
                  </div>

                 
                  <div class="form-group">
                    <label class = "require-input">Template</label>
                    <div class="mb-3">
                    <textarea class="textarea"  name="template" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('template', $emailtemplate->template)}}
                    </textarea>
                    </div>
                    @error('template')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                  
                  </div>

                  <div class="form-group">
                    <label class = "require-input">Status</label>
                    <select  name="status" class="form-control" >
                    <option value="0" {{$emailtemplate->status==0?'selected':''}}>Inactive</option>
                    <option value="1" {{$emailtemplate->status==1?'selected':''}}>Active</option>
                   
                    </select>
                    @error('status')
                    <div class="custom-error">{{ $message }}</div>
                    @enderror
                  
                  </div>
                 
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
<script src="{{ url('admin_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

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