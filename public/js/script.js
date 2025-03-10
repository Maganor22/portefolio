document.addEventListener("DOMContentLoaded", function () {
  // Gestion du thème dark/light
  const themeToggleButton = document.getElementById("theme-toggle");
  const body = document.body;
  const icon = themeToggleButton.querySelector("i");

  themeToggleButton.addEventListener("click", function () {
    body.classList.toggle("light-mode");
    if (body.classList.contains("light-mode")) {
      icon.classList.remove("bi-sun");
      icon.classList.add("bi-moon");
    } else {
      icon.classList.remove("bi-moon");
      icon.classList.add("bi-sun");
    }
  });

  // Animations sur les sections de fade-in
  const sections = document.querySelectorAll("section");
  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("fade-in");
          observer.unobserve(entry.target);
        }
      });
    },
    {
      rootMargin: "0px 0px -10% 0px",
    }
  );

  sections.forEach((section) => {
    observer.observe(section);
  });
});

// particlesJS("particles-js", {
//   particles: {
//     number: { value: 80, density: { enable: true, value_area: 800 } },
//     color: { value: "#ffffff" },
//     shape: { type: "circle" },
//     opacity: { value: 0.5, random: true },
//     size: { value: 3, random: true },
//     line_linked: {
//       enable: true,
//       distance: 150,
//       color: "#ffffff",
//       opacity: 0.4,
//       width: 1,
//     },
//     move: {
//       enable: true,
//       speed: 2,
//       direction: "none",
//       random: true,
//       out_mode: "out",
//     },
//   },
//   interactivity: {
//     detect_on: "canvas",
//     events: {
//       onhover: { enable: true, mode: "repulse" },
//       onclick: { enable: true, mode: "push" },
//     },
//     modes: {
//       repulse: { distance: 100, duration: 0.4 },
//       push: { particles_nb: 4 },
//     },
//   },
//   retina_detect: true,
// });

document.addEventListener("DOMContentLoaded", function () {
  // Ton code existant pour le thème et le fade-in reste ici

  // Canvas pour le "Jeu de la Vie" simplifié
  const canvas = document.createElement("canvas");
  const ctx = canvas.getContext("2d");
  document.getElementById("life-background").appendChild(canvas);

  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  // Redimensionnement du canvas si la fenêtre change
  window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  });

  // Création des cellules
  const cellSize = 20;
  const cols = Math.floor(canvas.width / cellSize);
  const rows = Math.floor(canvas.height / cellSize);
  let grid = createGrid();

  function createGrid() {
    return new Array(cols)
      .fill(null)
      .map(() =>
        new Array(rows).fill(null).map(() => (Math.random() > 0.85 ? 1 : 0))
      );
  }

  function drawGrid() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    for (let i = 0; i < cols; i++) {
      for (let j = 0; j < rows; j++) {
        if (grid[i][j]) {
          ctx.fillStyle = "rgba(255, 255, 255, 0.3)"; // Couleur des cellules
          ctx.fillRect(i * cellSize, j * cellSize, cellSize - 2, cellSize - 2);
        }
      }
    }
  }

  function updateGrid() {
    const newGrid = grid.map((arr) => [...arr]);
    for (let i = 0; i < cols; i++) {
      for (let j = 0; j < rows; j++) {
        const neighbors = countNeighbors(i, j);
        if (grid[i][j] === 1 && (neighbors < 2 || neighbors > 3))
          newGrid[i][j] = 0;
        else if (grid[i][j] === 0 && neighbors === 3) newGrid[i][j] = 1;
      }
    }
    grid = newGrid;
  }

  function countNeighbors(x, y) {
    let sum = 0;
    for (let i = -1; i < 2; i++) {
      for (let j = -1; j < 2; j++) {
        const col = (x + i + cols) % cols;
        const row = (y + j + rows) % rows;
        sum += grid[col][row];
      }
    }
    sum -= grid[x][y];
    return sum;
  }

  // Animation
  function animate() {
    drawGrid();
    updateGrid();
    setTimeout(() => requestAnimationFrame(animate), 200); // Ralentit l’animation
  }

  animate();
});
