var apiUrl = 'https://fakestoreapi.com/products'

export async function getAll() {
    const response = await fetch(apiUrl);
    const data = await response.json();
    return data;
}

export async function getById(id) {
    const response = await fetch(`${apiUrl}/${id}`)
    const data = await response.json();
    return data;
}
