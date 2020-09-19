<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Phase 1</title>
  @include('frontend.common.head')
</head>
<body>

<script>
    var app_url = '{{url('/')}}';
</script>
<div class="wrapper" role="main">
    <!--login section start-->

    <div class="login_main">
        <div class="login_auto">
            <div class="contact_inner">
                @include('frontend.common.header_logo')
                <div class="contact_form">
                    <ul>

                        <li>
                            <div class="contact_formFeild_out">
                                <div class="contact_form_feild">
                                    <input type="email" name="" placeholder="Email" class="login_email_field">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact_formFeild_out">
                                <div class="contact_form_feild">
                                    <input type="password" name="" placeholder="Password" class="login_password_field">
                                </div>
                            </div>
                        </li>

                        <li style="display: block">
                            <div class="contact_form_submit clearfix">
                                <input type="button" name="" value="Login" id="submit_login_form" >
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--login section start-->
</div>

</body>
</html>
