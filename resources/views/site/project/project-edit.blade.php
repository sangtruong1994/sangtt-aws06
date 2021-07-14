@extends('layouts.create')

@section('form')

    @include('components.flash-message')

    <form action="{{route('project.update',['id'=>$project->id])}}" method="POST">
        @csrf
        <div class="form-group-row mb-3">
            @include('components.input-text', [
                'name' => 'project_code',
                'label' => 'Mã',
                'value' => $project->code,
                'inputClass' => 'form-control d-inline w-75'
            ])
        </div>
        <div class="form-group-row mb-5">
            @include('components.input-text', [
                'name' => 'project_name',
                'label' => 'Tên',
                'value' => $project->name,
                'inputClass' => 'form-control d-inline w-75'
            ])
        </div>
        @include('components.buttons', [
            'buttons' => [
                ['iconClass' => 'fas fa-save', 'value' => 'Lưu', 'name' => 'update' ],
            ]
        ])

        @include('components.span-modal', [
           'value' => 'Xóa'
       ])
    </form>

    @include('components.modal', [
        'href' => route('project.destroy',['id'=>$project->id])
    ])

@endsection

@section('table')
    @include('components.table', [
        'fields' => [
            'code' => 'code',
            'name_project' => 'name',
            'edit' => 'pattern.modified'
           ],
        'items' => $projects,
        'edit_route' => 'project.edit'
    ])

    {{$projects->links()}}

@endsection