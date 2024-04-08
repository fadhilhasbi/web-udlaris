import './bootstrap';
import 'preline'

// Preline with Livewire Script
document.addEventListener("livewire:navigated", ()=> {
    HSStaticMethods.autoInit();
});
