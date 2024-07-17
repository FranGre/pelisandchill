<input type="file" {!! isset($attributes['accept']) ? 'accept="' . $attributes['accept'] . '"' : '' !!}>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement, {
            allowMultiple: {{ isset($attributes['multiple']) ? 'true' : 'false' }},
            labelIdle: {!! json_encode(
                isset($attributes['labelIdle'])
                    ? $attributes['labelIdle']
                    : 'Arrastra y suelta tus archivos o <span class="filepond--label-action"> Explora </span>',
            ) !!},
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg', 'image/jpng', 'image/bmp',
                'image/gif', 'image/svg', 'image/webp'
            ]
        });

        this.addEventListener('pondReset', e => {
            pond.removeFiles();
        });
    });
</script>
