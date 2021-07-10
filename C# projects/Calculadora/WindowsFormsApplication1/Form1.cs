using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        public string n1, n2, op;
        public float teste = -1, res = 0;
        private void zero_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "0";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "0";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }       
        private void um_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "1";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "1";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }        
        private void dois_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "2";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "2";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }
        private void tres_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "3";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "3";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }        
        private void quatro_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "4";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "4";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }
        private void cinco_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "5";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "5";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }
        private void seis_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "6";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "6";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }        
        private void sete_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "7";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "7";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }

        private void oito_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "8";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "8";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }
        private void nove_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + "9";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + "9";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }        
        private void ponto_Click(object sender, EventArgs e)
        {
            if (teste == -1)
            {
                n1 = n1 + ",";
                textBox1.Text = Convert.ToString(n1);
            }
            else
            {
                n2 = n2 + ",";
                textBox1.Text = Convert.ToString(n1 + op + n2);
            }
        }


        OperacoesMatematicas op1 = new OperacoesMatematicas();
        private void dividir_Click(object sender, EventArgs e)
        {
            if (teste == 0)
                MessageBox.Show("Não é possível fazer contas com mais de uma operação");
            else
            {
                teste = 0;
                op = "/";
                textBox1.Text = Convert.ToString(n1 + op);
            }
        }

        private void mult_Click(object sender, EventArgs e)
        {
            if (teste == 0)
                MessageBox.Show("Não é possível fazer contas com mais de uma operação");
            else
            {
                teste = 0;
                op = "*";
                textBox1.Text = Convert.ToString(n1 + op);
            }
        }

        private void menos_Click(object sender, EventArgs e)
        {
            if (teste == 0)
                MessageBox.Show("Não é possível fazer contas com mais de uma operação");
            else
            {
                teste = 0;
                op = "-";
                textBox1.Text = Convert.ToString(n1 + op);
            }
        }

        private void mais_Click(object sender, EventArgs e)
        {
            if (teste == 0)
                MessageBox.Show("Não é possível fazer contas com mais de uma operação");
            else
            {
                teste = 0;
                op = "+";
                textBox1.Text = Convert.ToString(n1 + op);
            }
        }

        private void circ_Click(object sender, EventArgs e)
        {
            if (teste == 0)
                MessageBox.Show("Não é possível fazer contas com mais de uma operação");
            else
            {
                teste = 0;
                op = "^";
                textBox1.Text = Convert.ToString(n1 + op);
            }
        }

        private void limpar_Click(object sender, EventArgs e)
        {
            n1 = "0";
            n2 = "0";
            res = 0;
            teste = -1;
            textBox1.Text = "0";
        }

        private void igual_Click(object sender, EventArgs e)
        {
            switch (op)
            {
                case "+" :
                    {
                        res = op1.Somar(Convert.ToSingle(n1), Convert.ToSingle(n2));
                        break;
                    }
                case "-" :
                    {
                        res = op1.Diminuir(Convert.ToSingle(n1), Convert.ToSingle(n2));
                        break;
                    }
                case "*" :
                    {
                        res = op1.Multiplicar(Convert.ToSingle(n1), Convert.ToSingle(n2));
                        break;
                    }
                case "/" :
                    {
                        res = op1.Dividir(Convert.ToSingle(n1), Convert.ToSingle(n2));
                        if (res == -1)
                            MessageBox.Show("Não é possível dividir nenhum número por 0");
                        break;
                    }
                case "^" :
                    {
                        res = op1.Potencia(Convert.ToSingle(n1), Convert.ToSingle(n2));
                        break;
                    }
            }
            string igual = "=";
            textBox1.Text = Convert.ToString(n1 + op + n2 + igual + res);
            n1 = Convert.ToString(res);
            n2 = "0";
            res = 0;
            teste = -1;
        }
    }
}
