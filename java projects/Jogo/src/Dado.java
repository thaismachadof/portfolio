import java.util.Random;

public class Dado implements Sorteador {
    public int sortear() {
        Random aleatorio = new Random();
        return aleatorio.nextInt(6) + 1;
    }
}
