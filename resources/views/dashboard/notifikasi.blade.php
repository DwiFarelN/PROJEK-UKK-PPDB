@extends('dashboard.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Notifikasi</h1>

<div class="bg-white shadow p-6 rounded-lg">
    @forelse($notifikasi as $n)
        <div class="border-b p-2">{{ $n->message }} <span class="text-gray-400 text-sm">{{ $n->created_at->diffForHumans() }}</span></div>
    @empty
        <p>Belum ada notifikasi.</p>
    @endforelse
</div>
@endsection
