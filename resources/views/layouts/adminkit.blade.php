<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="{{ asset('adminkit/img/icons/icon-48x48.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>AdminKit Demo - Bootstrap 5 Admin Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link href="https://demo-basic.adminkit.io/css/app.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
    @stack('css')
</head>

<body>

    <div class="wrapper">
        @include('partials.adminkit.side')

        <div class="main">
            @include('partials.adminkit.navbar')

            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>

            @include('partials.adminkit.footer')
        </div>
    </div>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="common-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">

                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <!-- Optional: Place to the bottom of scripts -->

    <script src="https://demo-basic.adminkit.io/js/app.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        $('.ajax_modal_btn').click(function() {
            let self = $(this)
            let modal_title = self.data('modal-title')
            let render_route = self.data('render-route')
            let render_method = self.data('render-method')
            let spinner = `        <span
            class="spinner-border spinner-border-sm"
            role="status"
            aria-hidden="true"
            ></span>`
            let modal = $('#common-modal')
            modal.find('.modal-title').text(modal_title)
            $.ajax({
                type: render_method,
                url: render_route,
                beforeSend: function() {
                    modal.find('.modal-body').html(spinner)
                },
                success: function(response) {
                    modal.find('.modal-body').html(response.html)
                }
            });
            modal.modal('show')
        })

        $(document).on('submit', '.ajax_form', function(e) {
            e.preventDefault();
            let form = $(this);
            let method = form.attr('method'); // e.g., "POST" or "GET"
            let action = form.attr('action'); // URL to submit the form
            let data = new FormData(form[0]); // Create FormData object

            $.ajax({
                type: method, // Use the method from the form (e.g., POST or GET)
                url: action, // Use the action URL from the form
                data: data, // Send FormData object
                processData: false, // Required for FormData to work properly
                contentType: false, // Prevent jQuery from setting the Content-Type header
                success: function(response) {
                    // Handle the response here
                    console.log(response); // Example: log the response
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.log('Error: ' + error);
                }
            });
        });
    </script>
    @stack('js')
</body>

</html>
