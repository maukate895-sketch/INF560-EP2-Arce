@if(session('success'))
    <div class="max-w-7xl mx-auto px-4 mt-5">
        <div class="bg-green-100 border border-green-400 text-green-800 p-4 rounded-lg">
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session('error'))
    <div class="max-w-7xl mx-auto px-4 mt-5">
        <div class="bg-red-100 border border-red-400 text-red-800 p-4 rounded-lg">
            {{ session('error') }}
        </div>
    </div>
@endif