<x-button.dropdown-button :title="__('field.action')">
    @foreach ($data['action'] as $item)
    @if ($item['title'] == 'Delete' || $item['title'] == 'Hapus')
    <a class="dropdown-item has-icon" href="javascript:;" onclick="hapus(`{{ $item['route'] }}`)" ><i class="{{ $item['icon'] }}"></i>
        {{ $item['title'] }}</a>
    @else
    <a class="dropdown-item has-icon" href="{{ $item['route'] }}"><i class="{{ $item['icon'] }}"></i>
        {{ $item['title'] }}</a>
    @endif       
    @endforeach
</x-button.dropdown-button>
