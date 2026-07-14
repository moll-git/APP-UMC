<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Configuracion extends Component
{
    public $activeSection = 'cuenta';
    
    // Cuenta state
    public $name;
    public $instrument = 'Guitarra';
    public $saved = false;

    // Tema state
    public $selectedTheme = 'dark';

    // Idioma state
    public $selectedLanguage = 'es';

    public function updatedSelectedTheme($theme)
    {
        $this->dispatch('theme-updated', theme: $theme);
    }

    public function updatedSelectedLanguage($lang)
    {
        $this->dispatch('lang-updated', lang: $lang);
    }

    // Notificaciones state
    public $notifications = [
        ['id' => 'n1', 'label' => 'Nuevos hilos en el Foro', 'desc' => 'Cuando alguien crea un hilo nuevo', 'enabled' => true],
        ['id' => 'n2', 'label' => 'Respuestas a tus hilos', 'desc' => 'Cuando alguien responde tus mensajes', 'enabled' => true],
        ['id' => 'n3', 'label' => 'Nuevos eventos', 'desc' => 'Ensayos, conciertos y reuniones', 'enabled' => true],
        ['id' => 'n4', 'label' => 'Cambios en el setlist', 'desc' => 'Cuando se actualiza el repertorio', 'enabled' => false],
        ['id' => 'n5', 'label' => 'Anuncios de la banda', 'desc' => 'Comunicados importantes', 'enabled' => true],
        ['id' => 'n6', 'label' => 'Nuevas fotos subidas', 'desc' => 'Cuando se añade contenido al álbum', 'enabled' => false],
    ];

    // FAQ state
    public $openFaqId = null;

    // Feedback state
    public $feedbackType = 'bug';
    public $feedbackText = '';
    public $feedbackSent = false;

    public function mount()
    {
        $this->name = Auth::user()->name;
        if (isset($_COOKIE['lang'])) {
            $this->selectedLanguage = $_COOKIE['lang'];
        }
        if (isset($_COOKIE['theme'])) {
            $this->selectedTheme = $_COOKIE['theme'];
        }
    }

    public function changeSection($section)
    {
        $this->activeSection = $section;
        $this->saved = false;
        $this->feedbackSent = false;
    }

    public function changeLanguage($lang)
    {
        $this->selectedLanguage = $lang;
        
        // 1. Guardar en sesión para que persista en futuras peticiones
        session()->put('locale', $lang);
        
        // 2. Cambiar el idioma de la aplicación en tiempo real para este renderizado
        app()->setLocale($lang);
        
        // 3. (Opcional) Actualizar la cookie si tu middleware la utiliza
        cookie()->queue(cookie('locale', $lang, 525600)); // 1 año
    }

    public function saveCuenta()
    {
        $user = Auth::user();
        $user->name = $this->name;
        $user->save();

        $this->saved = true;
        $this->dispatch('profile-updated', name: $this->name);
    }

    public function toggleNotification($index)
    {
        $this->notifications[$index]['enabled'] = !$this->notifications[$index]['enabled'];
    }

    public function toggleFaq($id)
    {
        // Compare as strings to avoid 0 == null issues
        if ($this->openFaqId !== null && (string)$this->openFaqId === (string)$id) {
            $this->openFaqId = null;
        } else {
            $this->openFaqId = (string)$id;
        }
    }

    public function sendFeedback()
    {
        if (empty(trim($this->feedbackText))) {
            return;
        }

        // Simulating feedback sending
        $this->feedbackSent = true;
        $this->feedbackText = '';
    }

    public function render()
    {
        return view('livewire.configuracion');
    }
}
