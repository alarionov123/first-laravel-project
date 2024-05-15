{{ Form::label('name', 'Имя') }}
{{ Form::text('name') }}<br>
{{ Form::label('description', 'Описание') }}
{{ Form::textarea('description') }}<br>
{{ Form::label('state', 'Состояние') }}
{{ Form::select('state', ['D' => 'Draft', 'P' => 'Published']) }}<br>
