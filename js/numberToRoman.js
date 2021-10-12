function parseToRoman(number) {
  const decimal = [1000, 500, 100, 50, 10, 5, 1];
  const roman = ["M", "D", "C", "L", "X", "V", "I"];

  let result = " ";

  for (let i = 0; i < decimal.length; i++) {
    // pour chaque decimal
    while (number % decimal[i] < number) {
      // tant que le reste du nombre divisé par le décimal est inférieur au nombre
      result += roman[i]; // on ajoute l'index de la lettre romaine dans le résultat
      number -= decimal[i]; // on soustrait la décimal au nombre de base
    }
  }
  return result;
}

parseToRoman(1564);
