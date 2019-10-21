@extends("admin.layout")
@section('title', 'Article')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
            <h6 class="m-0 font-weight-bold text-primary">Article table</h6>
            <a href="{{ route('article.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Add new</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Subtitle</th>
                        <th>Text</th>
                        <th>Image</th>
                        <th>Is active</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Subtitle</th>
                        <th>Text</th>
                        <th>Image</th>
                        <th>Is active</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Operations</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->slug }}</td>
                            <td>{{ $article->subtitle }}</td>
                            <td> {{ mb_substr( $article->text,0,100,'utf-8') }} @if(strlen($article->text)>100) ... @endif </td>
                            <td><img style="width: 100px; height: 100px;" src="{{ asset('uploads/article').'/'.$article->image }}"></td>
                            <td>
                                @if($article->is_active)
                                    Active
                                    @else
                                    Deactive
                                @endif
                            </td>
                            <td>{{ $article->created_at }}</td>
                            <td>{{ $article->updated_at }}</td>
                            <td>

                                <form id="delete-form" action="{{ route('article.destroy', $article->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary btn-circle btn-sm" href="{{ route('article.edit', $article->id) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="{{route('article.show',$article->id)}}" class="btn btn-primary btn-circle btn-sm">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
