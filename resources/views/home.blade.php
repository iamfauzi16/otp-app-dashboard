<x-app-layout>
    <x-heading title="Dashboard"/>

    <x-widget/>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-white rounded shadow">
                    <h5 class="text-dark">
                        {{ Auth::user()->name }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>