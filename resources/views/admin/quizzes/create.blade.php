<x-app-layout>
    <x-slot name="header">
        Quiz Oluştur
    </x-slot>

    @if ($errors->any())
        <div class="card">
            <div class="card-body">

                @foreach($errors->all() as $error)
                    <div class="alert alert-danger mb-3">
                        {{ $error }}
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('quizzes.store') }}" method="post">

                @csrf

                <div class="form-group mb-3">
                    <label for="title">
                        Quiz Başlığı
                    </label>
                    <input type="text" name="title" value="{{ old('title')  }}" class="form-control" id="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">
                        Quiz Açıklaması
                    </label>
                    <textarea name="description" rows="4" class="form-control" id="description" required>{{ old('description')  }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <input type="checkbox" id="isFinished" @if (old('finished_at')) checked @endif>
                    <label for="isFinished">
                        Bitiş tarihi olacak mı?
                    </label>
                </div>
                <div class="form-group mb-3" style="@if (!old('finished_at')) display: none @endif" id="finished">
                    <label for="finished_at">
                        Bitiş Tarihi
                    </label>
                    <input type="datetime-local" name="finished_at" value="{{ old('finished_at')  }}" class="form-control" id="finished_at">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-block btn-success">
                        Quiz Oluştur
                    </button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#isFinished').change(function () {
               if ($(this).is(':checked')) {
                   $('#finished').show();
               } else {
                   $('#finished').hide();
               }
            });
        </script>
    </x-slot>
</x-app-layout>
