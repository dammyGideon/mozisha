<!DOCTYPE html>
<html lang="en" xmlns:livewire="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="DC.title" content="" />
    <meta name="copyright" content="" />
    <meta name="robots" content="index,index" />
    <meta name="robots" content="index,follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Administrative panel - Mozisha</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user/img/cdiya.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/feathericon.min.cs')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/morris/morris.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables/datatables.min.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('admin/css/tailwind.css')}}">
    <link rel="styleshee    t" href="{{asset('admin/css/toastr.css')}}">
    <!--Laravel livewire styles  -->
    <livewire:styles />

    <script src="{{asset('js/app.js')}}"></script>
</head>

<body>

        <!-- The main content of the page -->


        @yield('content')

        <!-- End of the main content of the page-->
        <!--Livewire script-->
        <livewire:scripts />
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('admin/js/popper.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

{{--<!-- Slimscroll JS -->--}}
<script src="{{asset('admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- Form Validation JS -->
<script src="{{asset('admin/js/form-validation.js')}}"></script>

<!-- Mask JS -->
<script src="{{asset('admin/js/jquery.maskedinput.min.js')}}"></script>
<script src="{{asset('admin/js/mask.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('admin/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('admin/js/chart.morris.js')}}"></script>
<!-- Datatables JS -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/datatables.min.js')}}"></script>
<!-- Custom JS -->
<script  src="{{asset('admin/js/script.js')}}"></script>
        <script src="{{asset('user/js/script.js')}}"></script>
        {{--<script src="{{asset('js/app.js')}}"></script>--}}

        <script  src="{{asset('admin/js/toastr.js')}}"></script>
        <script>
            window.livewire.on('alert', param => {
                toastr[param['type']](param['message'], param['type']);
            });
        </script>

        <script src="https://cdn.tiny.cloud/1/vgsxkb3lxsc9m2ire6z0r4tlp1elrjc6tn84xuyhterweko7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea',
            });
            tinymce.init({
                selector: '#mytextarea_1',
            });
            tinymce.init({
                selector: '#mytextarea_2',
            });
            tinymce.init({
                selector: '#mytextarea_3',
            });
            tinymce.init({
                selector: '#mytextarea_4',
            });
            tinymce.init({
                selector: '#mytextarea_5',
            });
            tinymce.init({
                selector: '#mytextarea_6',
            });
            tinymce.init({
                selector: '#mytextarea_7',
            });
            tinymce.init({
                selector: '#mytextarea_8',
            });
            tinymce.init({
                selector: '#mytextarea_9',
            });

        </script>
</body>

</html>
