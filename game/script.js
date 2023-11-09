
level1 = [
    [1,1,1,0,1,1,1,0,1,1,1,1,1],
    [0,0,1,1,1,0,0,0,1,0,0,0,1],
    [1,1,1,0,1,1,1,0,1,0,1,1,1],
    [1,0,1,0,1,0,1,1,1,0,1,0,0],
    [1,0,1,0,1,0,1,0,1,0,1,1,1],
    [1,1,1,0,1,0,1,1,1,0,0,0,1],
    [1,0,0,0,1,0,1,0,1,1,1,0,1]
];


level2 = [
    [1,1,1,0,1,1,1,0,1,1],
    [0,0,1,1,1,0,0,0,0,1],
    [1,1,1,0,1,1,1,0,1,0],
    [1,0,1,0,0,1,0,1,1,1],
    [1,0,1,0,0,1,0,1,0,0],
    [1,0,1,0,1,1,1,1,1,1],
    [1,1,1,0,1,1,1,0,0,1],
    [1,0,0,0,1,0,1,0,1,1]
];



// level3 = [
//     [1,1,1,0,1,1,1,0,1,1,1,0,1,1,1,0,1,1],
//     [0,0,1,1,0,1,0,0,0,1,1,0,1,1,1,0,1,1],
//     [1,1,1,0,1,1,1,0,1,0,1,0,1,1,1,1,1,1],
//     [1,0,1,0,0,1,0,1,1,1,1,0,1,1,1,0,1,1],
//     [1,1,1,0,0,1,1,1,0,0,1,0,1,1,1,0,1,1],
//     [1,1,1,1,1,1,1,0,0,0,1,0,1,1,1,0,1,1],
//     [1,1,1,0,1,1,1,0,1,0,1,1,1,1,1,0,1,1],
//     [1,1,1,0,1,1,1,0,0,0,1,0,1,1,1,0,1,1],
//     [1,0,0,0,1,0,1,0,1,1,1,0,1,1,1,0,1,1]
// ];

level3 = [
    [1, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1],
    [1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 1],
    [0, 0, 0, 1, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 1, 0, 1, 0],
    [1, 1, 0, 1, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1],
    [1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 0, 1, 1, 1, 1, 0, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 0, 0, 0, 1, 1, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1]

];

function setWarriorPosition (x,y) {
    warrior.style.top = x + "px";
    warrior.style.left = y + "px";
};

function setDoorPosition (x,y) {
    door.style.top = x + "px";
    door.style.left = y + "px";
};

// Hector TIP escalabilidad --> array con las posiciones que no puede pasar
let mazeArray = level1;
let chooseLevel = document.getElementById("levelSelect");

chooseLevel.addEventListener("change",
function()
{
    let level = chooseLevel.value;
    console.log(level);

    if (level == 1)
    {
        mazeArray = level1;
        winPosition = [6,12];
        setDoorPosition(300,500);
    };
    if (level == 2)
    {
        mazeArray = level2;
        winPosition = [7,9];
        setDoorPosition(50,50);
    };
    if (level == 3)
    {
        mazeArray = level3;
        winPosition = [8,17];
        setDoorPosition(200,500);
    };

    maze.innerHTML =
    '<img src="images/warrior/warrior_down.gif" alt="warrior" id="warrior" height="50px" width="50px"> <img src="img/door.png" alt="door" id="door" height="50px" width="50px"> <div id="lantern"></div>'
    createMaze();
    console.log(mazeArray[0].length);
});
    
let maze = document.getElementById("maze-container");
let warrior= document.getElementById("warrior");
let door= document.getElementById("door");

// let warrior_up = document.getElementById("warrior_up");
// let warrior_left = document.getElementById("warrior_left");
// let warrior_right = document.getElementById("warrior_right");

// function warriorPosition(x, y) {
//     position = [x , y];
//     return position;
// }


// 0 is wall, 1 is space, 2 is warrior

// function winPosition(level)
// {
//     if (level == 1)
//     {
//         winPosition = [7,13];
//     };
//     if (level == 2)
//     {
//         winPosition = [8,10];
//     };
//     if (level == 3)
//     {
//         winPosition = [9,18];
//     };

//     return winPosition;
// }





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
    console.log("La lenght de la array es de " + mazeArray.length);

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

function win(warriorPosition)
{
    warriorPosition = getWarriorPosition();
    console.log(warriorPosition);

    if (warriorPosition[0] == winPosition[0] && warriorPosition[1] == winPosition[1])
    {
        alert("You win You win You win You win You win You win You win You win You win You win You win You win You win You win");
    }
}


document.addEventListener("keydown",
    function(e)
    {
        let warrior= document.getElementById("warrior");
        let warriorLeft = warrior.offsetLeft;
        let warriorTop = warrior.offsetTop;
        let warriorPosition = getWarriorPosition();
        let lantern= document.getElementById("lantern");

        if (e.key == "ArrowRight")
        {
            if (warriorLeft < (mazeArray[0].length - 1) * 50)
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
            if (warriorTop < (mazeArray.length - 1) * 50)
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
        lantern.style.top = (warriorTop + (warrior.offsetHeight/2) - (lantern.offsetHeight /2)) + 'px';
        lantern.style.left = (warriorLeft + (warrior.offsetWidth/2) - (lantern.offsetWidth /2)) + 'px';
        win(warriorPosition);
        console.log(mazeArray);

    }

       // if warrior arrive here, win!
    //    if (warriorPosition == 2 && mazeArray == 2)
    //    {
    //        alert
    //    }
    //    console.log(mazeArray);
);



    
