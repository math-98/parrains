@extends("shared.front")

@section('title', "Parrains")

@section("content")
    @auth
        <div class="row">
            <div class="col-6">
                <a href="{{ route('parrains.create') }}" class="btn btn-primary btn-block mb-3">
                    <i class="fas fa-user-plus"></i>
                    Ajouter un parrain
                </a>
            </div>
            <div class="col-6">
                <a href="{{ route('parrains.import') }}" class="btn btn-secondary btn-block mb-3">
                    <i class="fas fa-upload"></i>
                    Importer une liste
                </a>
            </div>
        </div>
    @endauth

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nom</th>
            @auth
                <th scope="col">Créé le</th>
                <th scope="col">Actions</th>
            @endauth
        </tr>
        </thead>
        <tbody>
            @foreach($parrains as $parrain)
                <tr>
                    <td>
                        {{ $parrain->lastname }} {{ $parrain->firstname }}
                        @if ($parrain->absent)
                            <span class="text-muted">(Absent)</span>
                        @endif
                    </td>
                    @auth
                        <td>{{ $parrain->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="row" role="group">
                                <div class="col-6">
                                    <a href="{{ route('parrains.edit', $parrain->id) }}" class="btn btn-block btn-success">
                                        <i class="fas fa-pen"></i>
                                        Editer
                                    </a>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $parrain->id }}">
                                        <i class="fas fa-trash"></i>
                                        Supprimer
                                    </button>
                                </div>
                            </div>
                        </td>
                    @endauth
                </tr>
                @auth
                    @include("parrains.delete_modal", ['parrain' => $parrain])
                @endauth
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                "language": {
                    "url": "{{ asset('js/datatables-french.json') }}"
                }
            });
        });
    </script>
@endsection
