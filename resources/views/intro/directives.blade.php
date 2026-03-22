
{{--{{ $post->title }}--}}
{{--{{ $post->id }}--}}
{{--{{ 1 + 2 }}--}}

{{--{{ $input }}--}}
{{--{!! $input !!}--}}


{{--@php--}}
{{--    $a = 34;--}}
{{--    $b = 45;--}}
{{--    $result = $a + $b;--}}
{{--@endphp--}}

{{--<div>{{ $result }}</div>--}}


{{--@inject('logger', App\Services\LoggerService::class)--}}
{{--{{ $logger->log() }}--}}


{{--@if($post->id > 10)--}}
{{--    Id > 10--}}
{{--@else--}}
{{--    Id < 10--}}
{{--@endif--}}


{{--@unless(Auth::check())--}}
{{--    Hello guest!--}}
{{--@endunless--}}

{{--@isset($post)--}}
{{--    Post is not null--}}
{{--@endisset--}}

{{--@empty($posts)--}}
{{--    No posts--}}
{{--@endempty--}}

{{--@auth--}}
{{--    User is authenticated--}}
{{--@endauth--}}

{{--@guest--}}
{{--    User is not authenticated--}}
{{--@endguest--}}

{{--@can('update', $post)--}}
{{--    <a href=""></a>--}}
{{--@endcan--}}

{{--@cannot()--}}

{{--@endcannot--}}

{{--@for($i = 0; $i < 10; ++$i)--}}
{{--    Value = {{ $i }}--}}
{{--@endfor--}}

{{--@foreach($posts as $p)--}}
{{--    <p>{{ $p->title }}</p>--}}
{{--@endforeach--}}

{{--@forelse($posts as $p)--}}
{{--    <p>{{ $p->title }}</p>--}}
{{--@empty--}}
{{--    <p>No posts</p>--}}
{{--@endforelse--}}

{{--@while(true) --}}
{{--    --}}
{{--@endwhile--}}


{{--@foreach($posts as $p)--}}
{{--    @if($loop->first)--}}
{{--        <p style="color: red;">{{ $p->title }}</p>--}}
{{--    @endif--}}

{{--    <p style="color: green;">{{ $p->title }}</p>--}}
{{--@endforeach--}}









