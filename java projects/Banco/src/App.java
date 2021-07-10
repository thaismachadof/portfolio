import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.text.ParseException;

public class App {
    private JButton enviarButton;
    private JPanel panel;
    private JTextField textField1;
    private JFormattedTextField formattedTextField1;

    public App() throws ParseException {
        enviarButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                long cpf = Long.valueOf(formattedTextField1.getText()).longValue();
                Pessoa p = new Pessoa(textField1.getText(), cpf);
                JOptionPane.showMessageDialog(null, "Pessoa: " +p.getNome()+ "  CPF: " +p.getCpf());
            }
        });
    }

    public static void main(String[] args) throws ParseException {
        JFrame frame = new JFrame("Banco");
        frame.setContentPane(new App().panel);
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.pack();
        frame.setVisible(true);
    }
}
