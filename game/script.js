let level1 = [
    [1,1,0,0,1],
    [0,1,1,0,1],
    [1,1,1,1,1],
    [1,0,1,0,0],
    [1,0,1,1,1]
];
// Hector TIP escalabilidad --> array con las posiciones que no puede pasar

let mazeArray = level1;
let maze = document.getElementById("maze-container");
let warrior= document.getElementById("warrior");
function setWarriorPosition (x,y) {
    warrior.style.top = x + "px";
    warrior.style.left = y + "px";
}
// let warrior_up = document.getElementById("warrior_up");
// let warrior_left = document.getElementById("warrior_left");
// let warrior_right = document.getElementById("warrior_right");

// function warriorPosition(x, y) {
//     position = [x , y];
//     return position;
// }


// 0 is wall, 1 is space, 2 is warrior
function createMaze() {
    for (let i = 0; i < mazeArray.length; i++) {
        let row = document.createElement("div");
        row.classList.add("row");

        for (let j = 0; j < mazeArray[i].length; j++) {
            let cell = document.createElement("div");
            cell.classList.add("cell");

            if (mazeArray[i][j] == 0) {
                cell.classList.add("wall");
            }
            
            if (i == 0 && j == 0) {
                mazeArray[i][j] = 2;
            }
            row.appendChild(cell);
        }
        maze.appendChild(row);
    }

    //setWarriorPosition(0,0);
}

function getWarriorPosition() {
    let position = [-1 , -1];
    for (let i = 0; i < mazeArray.length; i++) {
        for (let j = 0; j < mazeArray[i].length; j++) {
            if (mazeArray[i][j] == 2)  {
                position[0] = i;
                position[1] = j;
            }
        }
    }
    // console.log("warrior position is " + position);
    return position;
}


document.addEventListener("keydown",
    function(e)
    {
        let warrior= document.getElementById("warrior");
        let warriorLeft = warrior.offsetLeft;
        let warriorTop = warrior.offsetTop;
        let warriorPosition = getWarriorPosition();

        if (e.key == "ArrowRight")
        {
            if (warriorLeft < (mazeArray.length - 1) * 50)
            {
                if (mazeArray[warriorPosition[0]][warriorPosition[1] + 1] == 1)
                {
                    warriorLeft += 52;
                    warrior.style.left = warriorLeft + "px";
                    mazeArray[warriorPosition[0]][warriorPosition[1]] = 1;
                    mazeArray[warriorPosition[0]][warriorPosition[1] + 1] = 2;
                }
                //getWarriorPosition();
            }
        }
        if (e.key == "ArrowLeft")
        {
            if (warriorLeft > 0)
            {
                if (mazeArray[warriorPosition[0]][warriorPosition[1] - 1] == 1)
                {
                    warriorLeft -= 52;
                    warrior.style.left = warriorLeft + "px";
                    // changes the number (in mazeArray) where it was from 2 to 1
                    mazeArray[warriorPosition[0]][warriorPosition[1]] = 1;
                    // changes the number (in mazeArray) where the movement continues from 1 to 2
                    mazeArray[warriorPosition[0]][warriorPosition[1] - 1] = 2;
                }
            }
        }
        if (e.key == "ArrowUp")
        {
            if (warriorTop > 0)
            {
                if (mazeArray[warriorPosition[0] - 1][warriorPosition[1]] == 1)
                {
                    warriorTop -= 52;
                    warrior.style.top = warriorTop + "px";
                    mazeArray[warriorPosition[0]][warriorPosition[1]] = 1;
                    mazeArray[warriorPosition[0] - 1][warriorPosition[1]] = 2;
                }
            }
        }
        if (e.key == "ArrowDown")
        {
            if (warriorTop < (level1.length - 1) * 50)
            {
                if (mazeArray[warriorPosition[0] + 1][warriorPosition[1]] == 1)
                {
                    warriorTop += 52;
                    warrior.style.top = warriorTop + "px";
                    mazeArray[warriorPosition[0]][warriorPosition[1]] = 1;
                    mazeArray[warriorPosition[0] + 1][warriorPosition[1]] = 2;
                }
            }
        }
        console.log(mazeArray);
    }

    // [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,1,1,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    // [0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
);
