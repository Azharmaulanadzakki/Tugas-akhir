<style>
    .truncated-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 300ms linear;
    }

    .truncated-text:hover {
        white-space: normal;
        overflow: visible;
        transition: all 300ms linear;
    }
</style>

@foreach ($mapels as $index => $mapel)
    <a href="{{ route('materi', ['parent_id' => $mapel->id]) }}">
        <div id="mapel-list-{{ $index }}" class="rounded-3xl shadow-lg mapel-item" data-index="{{ $index }}">
            <div class="rounded-3xl shadow-lg bg-white">
                <div class="rounded-b-none rounded-t-3xl overflow-hidden">
                    <img src="{{ asset('/storage/mapels/' . $mapel->image) }}" alt=""
                        class="aspect-[1/1] w-full h-52">
                </div>
                <div class="p-2 sm:p-4 flex flex-col">
                    <h5 class="text-xl font-bold mt-3 text-gray-900 truncated-text">
                        {{ $mapel->judul }}
                    </h5>
                    <h7 class="text-md font-normal text-gray-600">
                        Rp.{{ number_format($mapel->harga, 2, ',', '.') }}
                    </h7>
                    <div class="flex justify-end items-end space-x-2">
                        <i class="fa-duotone fa-signal-bars py-1 text-2xl font-bold" style="color: #506fff;">
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </a>
@endforeach
