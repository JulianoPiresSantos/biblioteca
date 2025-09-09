<form method="GET" class="me-3 d-flex align-items-center">
    <label for="perPage" class="me-2 mb-0 small text-muted">Mostrar</label>
    <select name="perPage" id="perPage" class="form-select form-select-sm" onchange="this.form.submit()">
        @foreach([5, 10, 25, 50] as $size)
            <option value="{{ $size }}" {{ request('perPage', 5) == $size ? 'selected' : '' }}>
                {{ $size }}
            </option>
        @endforeach
    </select>

    @foreach(request()->except('perPage', 'page') as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach
</form>
