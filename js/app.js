"use strict";

const URL = "api/equipos/";
let teams = [];
let form = document.querySelector('#task-form');
form.addEventListener('submit', insertEquipo);

async function getAll() {
    try {
        let response = await fetch(URL);
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }
        teams = await response.json();
        showEquipos();
    } catch (e) {
        console.log(e);
    }
}

async function insertEquipo(e) {
    e.preventDefault();
    
    let data = new FormData(form);
    let team = {
        equipo: data.get('equipo'),
        liga: data.get('liga'),
        pais: data.get('pais'),
    };

    try {
        let response = await fetch(URL, {
            method: "POST",
            headers: { 'Content-Type': 'application/json'},
            body: JSON.stringify(team)
        });

        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let newTask = await response.json();

        teams.push(newTask);
        showEquipos();

        form.reset();
    } catch (error) {
        console.log(error);
        // Mostrar mensaje de error al usuario si es necesario
    }
} 

async function deleteEquipo(e) {
    e.preventDefault();
    try {
        let id = e.target.dataset.team;
        let response = await fetch(URL + id, { method: 'DELETE' });
        if (!response.ok) {
            throw new Error('Recurso no existe');
        }

        teams = teams.filter(team => team.id != id);
        showEquipos();
    } catch (error) {
        console.log(error);
        // Mostrar mensaje de error al usuario si es necesario
    }
}



function showEquipos() {
    let ul = document.querySelector("#task-list");
    ul.innerHTML = "";
    for (const team of teams) {
        let html = `
            <li class='list-group-item d-flex justify-content-between align-items-center'>
                <span>${team.equipo} - ${team.liga} - ${team.pais}</span>
                <div class="ml-auto">
                    <a href='#' data-team="${team.id}" type='button' class='btn btn-danger btn-delete'>Borrar</a>
                </div>
            </li>
        `;
        ul.innerHTML += html;
    }

    const btnsDelete = document.querySelectorAll('a.btn-delete');
    for (const btnDelete of btnsDelete) {
        btnDelete.addEventListener('click', deleteEquipo);
    }

   
}

getAll();