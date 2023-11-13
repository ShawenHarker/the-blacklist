@props(['blacklisting', 'id']);

<?php
    $listedItems = array_filter($blacklisting, function($listing) use ($id) {
        return $listing['school_id'] == $id;
    });
?>

<tr class="hidden" id="section_{{ $id }}">
    @foreach($listedItems as $listedItem)
        <td colspan="4">
            <div class="flex-col">
                <div class="form-group">
                    <x-input-label for="reason">Reason For Blacklisting</x-input-label>
                    <input 
                        class="w-full mt-4 mb-4"
                        type="text"
                        name="reason"
                        id="reason"
                        value="{{ $listedItem->reason }}"
                        disabled
                    />
                </div>
                <div class="flex w-full mt-4 mb-4">
                    @if ($listedItem->image)
                        <div class="form-group">
                            <x-input-label for="reason">Image</x-input-label>
                            <img src="{{ $listedItem->image }}" alt="image">
                        </div>
                    @endif
                    <div>
                        @if ($listedItem->mp3)
                            <x-input-label for="reason">Voice Recording</x-input-label>
                            <audio controls>
                                <source src="{{ $listedItem->mp3 }}" type="audio/ogg">
                                <source src="{{ $listedItem->mp3 }}" type="audio/mpeg">
                            </audio>
                        @endif
                    </div>
                </div>
                <div>
                    @if ($listedItem->mp4)
                        <x-input-label for="reason">Video Recording</x-input-label>
                        <video width="320" height="240" controls>
                            <source src="{{ $listedItem->mp4 }}" type="video/mp4">
                            <source src="{{ $listedItem->mp4 }}" type="video/ogg">
                        </video>
                    @endif
                </div>
            </div>
        </td>
    @endforeach
</tr>
