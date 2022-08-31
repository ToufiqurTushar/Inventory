<x-app>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('members.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.members.create_title')
            </h4>

            <x-form
                method="POST"
                action="{{ route('members.store') }}"
                class="mt-4"
            >
                @include('app.members.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('members.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        @lang('crud.common.back')
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="fa fa-floppy-disk"></i>
                        @lang('crud.common.create')
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
</x-app>
