import * as FilePond from 'filepond'
import 'filepond/dist/filepond.min.css'

// Import the plugin code
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

// Register the plugin
FilePond.registerPlugin(FilePondPluginFileValidateType);


window.FilePond = FilePond
