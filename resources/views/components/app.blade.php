<x-template>
    @include('common.header')
    @include('common.sidebar')
    <!--Container Main start-->
    <div class="height-100 bg-light">
        {{ $slot }}
    </div>
    <!--Container Main end-->
    @include('common.modal')
</x-template>
