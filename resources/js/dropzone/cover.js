import Dropzone from "dropzone"
import "dropzone/dist/dropzone.css"

Dropzone.autoDiscover = false

let dropzone = new Dropzone("#cover", {
    url: "/upload/cover",
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
})