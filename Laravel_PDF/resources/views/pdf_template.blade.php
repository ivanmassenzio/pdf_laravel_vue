<!DOCTYPE html>
<html>
<head>
    <title>PDF Template</title>
</head>
<body>
    <h1>PDF Example</h1>
    {{-- <p>ID: {{ $id }}</p> --}}
    <p>Nombre: {{ $nombre }}</p>
    <p>Versión: {{ $version }}</p>
    
    <h2>Componentes Genéricos</h2>
    <ul>
        @foreach ($cg as $componente)
            <li>{{ $componente }}</li>
        @endforeach
    </ul>
    
    <h2>Trabajos y Tareas</h2>
    <ul>
        @foreach ($trabajo_tarea as $trabajo)
            <li>{{ $trabajo }}</li>
        @endforeach
    </ul>
</body>
</html>
