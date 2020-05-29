/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package view;

import control.HomeJumbotron;
import javax.swing.JOptionPane;
import javax.swing.JScrollPane;
import model.domain.HomeJumbotronModel;

/**
 *
 * @author lgpc1
 */
public class ViewMidiaHomeJumbotron extends javax.swing.JInternalFrame {

    /**
     * Creates new form ViewMidiaHomeJumbotron
     */
    
    public ViewMidiaHomeJumbotron() {
        initComponents();
        
        loadJumbotronViewData();
    }
    
    private void loadJumbotronViewData(){
        HomeJumbotronModel jumbotronData = HomeJumbotron.loadJumbotron();
        
        txtTitulo.setText(jumbotronData.getTitulo());
        txtSubtitulo.setText(jumbotronData.getSubtitulo());
        txtTexto.setText(jumbotronData.getTexto());
        txtTextoBotao.setText(jumbotronData.getTextoBotao());
        
        if(jumbotronData.getStatus() == 1){
            
            cbAtivar.setSelected(true);
            status.setText("Ativo");
            
        }else{
            
            cbAtivar.setSelected(false);
            status.setText("Desativado");
            
        }
    }
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        pnlEditarJumbotron = new javax.swing.JPanel();
        lblTitulo = new javax.swing.JLabel();
        txtTitulo = new javax.swing.JTextField();
        lblSubtitulo = new javax.swing.JLabel();
        txtSubtitulo = new javax.swing.JTextField();
        lblTexto = new javax.swing.JLabel();
        txtTexto = new javax.swing.JTextField();
        lblTextoBotao = new javax.swing.JLabel();
        txtTextoBotao = new javax.swing.JTextField();
        lblStatus = new javax.swing.JLabel();
        status = new javax.swing.JLabel();
        btnSalvar = new javax.swing.JButton();
        cbAtivar = new javax.swing.JCheckBox();

        setClosable(true);

        pnlEditarJumbotron.setBorder(javax.swing.BorderFactory.createTitledBorder(null, "Editar Jumbotron da Página Principal", javax.swing.border.TitledBorder.CENTER, javax.swing.border.TitledBorder.DEFAULT_POSITION));

        lblTitulo.setText("Título:");

        lblSubtitulo.setText("Subtitulo:");

        lblTexto.setText("Texo:");

        lblTextoBotao.setText("Botão:");

        javax.swing.GroupLayout pnlEditarJumbotronLayout = new javax.swing.GroupLayout(pnlEditarJumbotron);
        pnlEditarJumbotron.setLayout(pnlEditarJumbotronLayout);
        pnlEditarJumbotronLayout.setHorizontalGroup(
            pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnlEditarJumbotronLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addComponent(lblTextoBotao, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lblTitulo, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.PREFERRED_SIZE, 44, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblSubtitulo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lblTexto, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                    .addComponent(txtTitulo)
                    .addComponent(txtSubtitulo)
                    .addComponent(txtTextoBotao)
                    .addComponent(txtTexto, javax.swing.GroupLayout.DEFAULT_SIZE, 294, Short.MAX_VALUE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );
        pnlEditarJumbotronLayout.setVerticalGroup(
            pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(pnlEditarJumbotronLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblTitulo)
                    .addComponent(txtTitulo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblSubtitulo)
                    .addComponent(txtSubtitulo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lblTexto)
                    .addComponent(txtTexto, javax.swing.GroupLayout.PREFERRED_SIZE, 99, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(pnlEditarJumbotronLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(txtTextoBotao, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(lblTextoBotao))
                .addContainerGap(22, Short.MAX_VALUE))
        );

        lblStatus.setText("Jumbotron status:");

        btnSalvar.setText("SALVAR");
        btnSalvar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnSalvarActionPerformed(evt);
            }
        });

        cbAtivar.setText("Jumbotron Ativo");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(btnSalvar, javax.swing.GroupLayout.PREFERRED_SIZE, 149, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 94, Short.MAX_VALUE)
                        .addComponent(cbAtivar, javax.swing.GroupLayout.PREFERRED_SIZE, 139, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(pnlEditarJumbotron, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(lblStatus)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(status)
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(pnlEditarJumbotron, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblStatus)
                    .addComponent(status))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(cbAtivar, javax.swing.GroupLayout.DEFAULT_SIZE, 33, Short.MAX_VALUE)
                    .addComponent(btnSalvar, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents
    

    
    private void btnSalvarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnSalvarActionPerformed
        HomeJumbotronModel jumbotronData = HomeJumbotron.loadJumbotron();
        
        jumbotronData.setTitulo(txtTitulo.getText());
        jumbotronData.setSubtitulo(txtSubtitulo.getText());
        jumbotronData.setTexto(txtTexto.getText());
        jumbotronData.setTextoBotao(txtTextoBotao.getText());
        
        if(cbAtivar.isSelected()){
            jumbotronData.setStatus(1);
        }else{
            jumbotronData.setStatus(0);
        }
        
        Boolean result = HomeJumbotron.saveJumbotron(jumbotronData);
        
        if(result){
            JOptionPane.showMessageDialog(this, "Jumbotron salvo com sucesso.");
            
        }else{
            JOptionPane.showMessageDialog(this, "Não foi possivel salvar.", "Erro.", JOptionPane.WARNING_MESSAGE);
        }
        loadJumbotronViewData();
    }//GEN-LAST:event_btnSalvarActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnSalvar;
    private javax.swing.JCheckBox cbAtivar;
    private javax.swing.JLabel lblStatus;
    private javax.swing.JLabel lblSubtitulo;
    private javax.swing.JLabel lblTexto;
    private javax.swing.JLabel lblTextoBotao;
    private javax.swing.JLabel lblTitulo;
    private javax.swing.JPanel pnlEditarJumbotron;
    private javax.swing.JLabel status;
    private javax.swing.JTextField txtSubtitulo;
    private javax.swing.JTextField txtTexto;
    private javax.swing.JTextField txtTextoBotao;
    private javax.swing.JTextField txtTitulo;
    // End of variables declaration//GEN-END:variables
}
