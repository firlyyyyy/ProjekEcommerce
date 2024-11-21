import './bootstrap';
import 'preline'

docoment.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
});
