


# API FUTBOL ⚽

## INTEGRANTES
Errezarret Franco(franerre15@gmail.com), Lescano Agustin(agustinlescanouni@gmail.com).

## DESCRIPCION
Trabajo especial 3ra entrega, se trata sobre una api de futbol donde podemos obtener jugadores y/o equipos, donde tambien
se puede editar, eliminar, crear entre algunas opciones.

### OBTENER TODOS LOS EQUIPOS

```http
  GET /tpe-rest/api/equipos
```
#### ejemplo:

```json
[
    {
        "id": 3,
        "equipo": "Napoli",
        "liga": "Serie A",
        "pais": "Italia"
    },
    {
        "id": 4,
        "equipo": "PSG",
        "liga": "League One",
        "pais": "Francia"
    },
    {
        "id": 5,
        "equipo": "La Roma",
        "liga": "Serie A",
        "pais": "Italia"
    }
    
]
```

### OBTENER TODO LOS JUGADORES

```http
  GET /tpe-rest/api/jugadores
```
#### ejemplo:

```json
[
{
        "id": 66,
        "nombre": "Ferran ",
        "apellido": "Torres",
        "id_equipo": 9
    },
    {
        "id": 68,
        "nombre": "Jules ",
        "apellido": "Koundé",
        "id_equipo": 9
    },
    {
        "id": 83,
        "nombre": "Victor ",
        "apellido": "Osimhen",
        "id_equipo": 3
    },
    {
        "id": 87,
        "nombre": "Piotr ",
        "apellido": "Zielinski",
        "id_equipo": 3
    },
    {
        "id": 89,
        "nombre": "Kylian ",
        "apellido": "Mbappé",
        "id_equipo": 4
    },
    {
        "id": 91,
        "nombre": "Achraf ",
        "apellido": "Hakimi",
        "id_equipo": 4
    },
    {
        "id": 93,
        "nombre": "Goncalo ",
        "apellido": "Ramos",
        "id_equipo": 4
    },
    {
        "id": 94,
        "nombre": "Romelu ",
        "apellido": "Lukaku",
        "id_equipo": 5
    }    
    ]
```
### OBTENER EQUIPO POR ID

```http
  GET /tpe-rest/api/equipos/3
```
#### ejemplo:

```json
[
{
    "id": 3,
    "equipo": "Napoli",
    "liga": "Serie A",
    "pais": "Italia"
}
    ]
```

### OBTENER JUGADOR POR ID

```http
  GET /tpe-rest/api/jugadores/66
```
#### ejemplo:

```json
[
{
    "id": 66,
    "nombre": "Ferran ",
    "apellido": "Torres",
    "id_equipo": 9
}
    ]
```

### CREAR UN NUEVO EQUIPO

```http
  POST /tpe-rest/api/equipos/
```
#### ejemplo:

```json
[
{
      (la ID No es necesario modificar ya que se incrementa sola) ⚠️
        "equipo": "Nombre...",
        "liga": "Liga...",
        "pais": "Pais.."  
}
    ]
```
### CREAR UN NUEVO JUGADOR

```http
  POST /tpe-rest/api/jugadores/
```
#### ejemplo:

```json
[
{
      (la ID No es necesario modificar ya que se incrementa sola) ⚠️
        "nombre": "Nombre..",
        "apellido": "Apellido..",
        "id_equipo": "id del equipo.."
}
    ]
```
### ELIMINAR UN EQUIPO 

```http
  DELETE /tpe-rest/api/equipos/3
```
#### ejemplo:

```json
[
{
      "El equipo con id=3 ha sido borrado."
}
    ]
```
### ELIMINAR UN JUGADOR 

```http
  DELETE /tpe-rest/api/jugadores/66
```
#### ejemplo:

```json
[
{
      "El jugador con id=66 ha sido borrado."
}
    ]
```
### MODIFICAR UN EQUIPO

```http
  PUT /tpe-rest/api/equipos/3
```
#### ejemplo:

```json
[
        "id": 3,
        "equipo": "Nombre..",
        "liga": "Liga..",
        "pais": "Pais..."
    ]
```
Se modifica y se guarda en la base de datos

### MODIFICAR UN JUGADOR

```http
  PUT /tpe-rest/api/jugadores/66
```
#### ejemplo:

```json
[
        "id": 66,
        "nombre": "Nombre..",
        "apellido": "Apellido..",
        "id_equipo": "ID del equipo.."     
    ]
```
Se modifica y se guarda en la base de datos

