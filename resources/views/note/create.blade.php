<x-app-layout>
  <div class="note-container single-note">
    <h1>Create a new note</h1>
    <form action="{{ route('note.store') }}" class="note" method="POST">
      @csrf
      <textarea name="note" class="note-body" rows="10" placeholder="Enter your note here..."></textarea>
      <div class="note-buttons">
        <a href="{{ route('note.index') }}" class="note-cancel-button">Cancel</a>
        <button type="submit" class="note-submit-button">submit</button>
      </div>
    </form>
  </div>
</x-app-layout>