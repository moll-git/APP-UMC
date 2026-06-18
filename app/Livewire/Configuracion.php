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
    }

    public function changeSection($section)
    {
        $this->activeSection = $section;
        $this->saved = false;
        $this->feedbackSent = false;
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
        if ($this->openFaqId === $id) {
            $this->openFaqId = null;
        } else {
            $this->openFaqId = $id;
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
