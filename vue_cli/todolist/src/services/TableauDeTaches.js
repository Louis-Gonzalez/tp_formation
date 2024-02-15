let tableauTaches = [];

function create(tache) { // créer la function lire Create le "C" du CRUD
    // ici les ... points permettent de fusion les valeurs du tableau en les gardant
    tableauTaches = [tache, ...tableauTaches]; 
    console.log("Ma liste de taches", tableauTaches);
}

function read() { // créer la function lire Read le "R" du CRUD
    return tableauTaches;
}

/*
function update(){ // créer la function lire Read le "U" du CRUD

}

function delete(){ // créer la function lire Read le "D" du CRUD

}
*/
export default {
    create,
    read,
};
