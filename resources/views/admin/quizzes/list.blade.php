<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizzes.create')  }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i>
                    Quiz Oluştur
                </a>
            </h5>
            <table class="table table-responsive table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            Quiz
                        </th>
                        <th scope="col">
                            Durum
                        </th>
                        <th scope="col">
                            Bitiş Tarihi
                        </th>
                        <th scope="col">
                            İşlemler
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                        <tr>
                            <td>
                                {{ $quiz->title  }}
                            </td>
                            <td>
                                {{ $quiz->status  }}
                            </td>
                            <td>
                                {{ $quiz->finished_at  }}
                            </td>
                            <td>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->links()  }}
        </div>
    </div>
    <x-slot name="js">

    </x-slot>
</x-app-layout>
