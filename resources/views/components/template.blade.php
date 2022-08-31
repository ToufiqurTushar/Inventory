<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory</title>

    <!-- -alpine js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- font-awesome CSS -->
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />

    <!-- notify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css" />

    <!-- custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style-v1.css') }}" />

    @livewireStyles
</head>

<body id="main">
<div class="container-fluid">
    {{ $slot }}
</div>


@livewireScripts

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- custom JavaScript -->
<script type="text/javascript" src="{{ asset('js/style-v1.js') }}"></script>

<!--notify message- -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script type="text/javascript">//notify script
    @if (session()->has('success'))
    const notyf = new Notyf({dismissible: true});
    notyf.success("{{ session('success') }}");
    @php  session()->forget('success');  @endphp
    @endif
    @if (session()->has('error'))
    const notyf = new Notyf({dismissible: true});
    notyf.error("{{ session('error') }}");
    @php session()->forget('error');  @endphp
    @endif

    /* Simple Alpine Image Viewer */
    document.addEventListener('alpine:init', () => {
        Alpine.data('imageViewer', (src = '') => {
            return {
                imageUrl: src,

                refreshUrl() {
                    this.imageUrl = this.$el.getAttribute("image-url")
                },

                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (! event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
            }
        })
    })
</script>
<!--for later script- -->
@stack('script')
</body>

</html>
