using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Funcao_quadratica
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            decimal a = numericUpDown1.Value;
            decimal b = numericUpDown2.Value;
            decimal c = numericUpDown3.Value;
            decimal x = numericUpDown4.Value;

            FuncaoQuad f1 = new FuncaoQuad(a, b, c);
            decimal teste = f1.setA();

            if (teste == -1)
            {
                textBox1.Text = Convert.ToString(f1.Raiz1());
                textBox2.Text = Convert.ToString(f1.Raiz2());

                if (textBox1.Text == "NaN")
                {
                    MessageBox.Show("Esta função não tem raíz real");
                }
            }
            else
            {
                MessageBox.Show("Valor de A inválido");
            }
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            decimal a = numericUpDown1.Value;
            decimal b = numericUpDown2.Value;
            decimal c = numericUpDown3.Value;
            decimal x = numericUpDown4.Value;

            FuncaoQuad f1 = new FuncaoQuad(a, b, c);
            textBox3.Text = Convert.ToString(f1.ImagemY(x));

        }
    }
}