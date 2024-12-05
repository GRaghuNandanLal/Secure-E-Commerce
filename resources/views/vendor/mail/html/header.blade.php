<base href="/public">
@props(['url'])
<tr style="background-color: black">
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="my/logo.jpg" alt="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
