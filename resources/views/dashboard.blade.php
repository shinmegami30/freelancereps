@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'dashboard'])

@section('content')
    <!-- <script>
        window.location.href = "{{ route('members.index')  }}";
    </script>
    -->
    
    @include('alerts.success')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title">Welcome to Dashboard!</h2>
                            <h5 class="card-category">We’ve assembled some links to get you started:</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row pl-2 pr-2">
                        <div class="col-sm-4 text-left">
                            <h3 class="mb-2">Get Started</h3>
                            <a href="{{ route('members.import')  }}" class="btn btn-fill btn-primary mb-2">Import Excel File</a>
                            <p>or <a href="{{ route('members.index')  }}">go to the listing member page</a></p>
                        </div>
                        <div class="col-sm-6 col-md-4 text-left">
                            <h3>Next Steps</h3>
                            <p><a href="{{ route('members.create')  }}"><i class="fas fa-plus-square"></i> Create new member</a></p>
                            <p><a href="{{ route('profile.edit')  }}"><i class="fas fa-edit"></i> Update my profile</a></p>
                            <p><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout my account</a></p>
                        </div>
                        <div class="col-sm-6 col-md-4 text-left">
                            <h3>More Actions</h3>
                            <p><i class="fas fa-cog"></i> Manage <a href="#">settings</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Net Fusion Technology Pty Ltd</h5>
                </div>
                <div class="card-body">
                    <div class="pl-2 pr-2">
                    <p><img src="http://netfusiontechnology.com/wp-content/themes/netfusiontechnology/images/logo-meta.jpg" style="max-width:100%;"></p>
                    <h4>If you need to get in touch with <b><a href="http://netfusiontechnology.com/" target="_blank">Net Fusion Technology</a></b>, please send a message below:</h4>
                    <form name="post" method="post" id="quick-contact" class="initial-form hide-if-no-js">
                        <div id="messageWrapper"></div>

                        <p>All fields are required.</p>
                        <div class="input-text-wrap" id="title-wrap">
                            <label class="form-control-label" for="input-name">Name </label>
                            <input type="text" name="name" id="name" class="form-control form-control-alternative" autocomplete="off">
                        </div>

                        <div class="input-text-wrap" id="title-wrap">
                        <label class="form-control-label" for="input-subject">Subject </label>
                            <input type="text" name="subject" id="subject" class="form-control form-control-alternative" autocomplete="off">
                        </div>

                        <div class="textarea-wrap" id="description-wrap">
                        <label class="form-control-label" for="input-message">Message</label>
                            <textarea name="message" id="message" class="form-control form-control-alternative" rows="3" cols="15" autocomplete="off"></textarea>
                        </div>

                        <p class="submit">
                            <input type="hidden" class="" id="rs_quick_contact_nonce" name="rs_quick_contact_nonce" value="8303b77bca">
                            <input type="hidden" name="_wp_http_referer" value="/wp-admin/index.php">
                            <input type="submit" name="send" id="send-contact" class="btn btn-sm btn-primary"  value="Send Message" disabled />
                            <br class="clear">
                        </p>
                    </form>
                    <script>
                    $(document).ready(function($) {
                        $("form#quick-contact").submit(function(){
                            var submit = $("form#quick-contact #send-contact"),
                                message	= $("form#quick-contact #messageWrapper"),
                                contents = {
                                    action: 	'quick_contact',
                                    nonce: 		this.rs_quick_contact_nonce.value,
                                    name:		this.name.value,
                                    subject:	this.subject.value,
                                    message:	this.message.value
                                };
                            submit.attr("disabled", "disabled").addClass('disabled');
                            submit.val('loading...');

                            $.post( ajaxurl, contents, function( data ) {
                                submit.removeAttr("disabled").removeClass('disabled');
                                submit.val('Send Message');
                                message.html( data );
                            });
                            
                            return false;
                        });
                    });
                    </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">NFT News Feed</h5>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            &nbsp;
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush
