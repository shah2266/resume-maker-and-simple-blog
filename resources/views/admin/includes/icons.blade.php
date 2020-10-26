{{ dump($companyIcon) }}
@foreach($icons as $key => $icon)
    @if($companyIcon == 'fa '.$icon)
        <option value="{{ 'fa '.$icon }}" selected> {{ $icon }}</option>
    @else
        <option value="{{ 'fa '.$icon }}"> {{ $icon }}</option>
    @endif
@endforeach
