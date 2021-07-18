    function Panggil(){
        noAntri = document.getElementById('no_antri').value;
      if(noAntri == '') alert('Tidak Ada Antrian');
      else{
        var ratus,puluh,satuan,belas,sratus,spuluh,ssatuan,res;
        console.log('No Antri : '+noAntri);

        if(noAntri>999){
              res = 'Inputan Melebihi Batas';
        } else {
          satuan= Math.floor((noAntri % 100) % 10);
          ratus = Math.floor(noAntri / 100);
          puluh = Math.floor((noAntri % 100) / 10);
          belas = (puluh*10)+satuan;

          path = '<?php echo base_url() ?>assets/audio/';
          audioNomor_Antrian = new Audio(path+'Nomor_Antrian.mp3');
          audioRatus = new Audio(path+'ratus.mp3');
          audioPuluh = new Audio(path+'puluh.mp3');

          

              if(ratus>0 && ratus<10){
                if(ratus == 1){
                  sratus = path+'Se.mp3';
                } else{
                  sratus = path+ratus+'.mp3';
                }
              } else{
                sratus = '';
              }

             if(puluh>0 && puluh<10){
                if(puluh == 1){
                  spuluh = path+'Se.mp3';
                } else{
                  spuluh = path+puluh+'.mp3';
                }
             } else{
                spuluh = '';
             }

              if(satuan>0 && satuan<10){
                  ssatuan = path+satuan+'.mp3';
              } else{
                  ssatuan = '';
              }

              if(belas>10 && belas<20){
                puluh = 0;
                if(belas == 11){
                  spuluh = path+'Se.mp3';
                  audioPuluh = new Audio(path+'belas.mp3');
                } else{
                  spuluh = path+(belas-10)+'.mp3';
                  audioPuluh = new Audio(path+'belas.mp3');
                }
              }

      }
      
      audioSRatus = new Audio(sratus);
      audioSPuluh = new Audio(spuluh);
      audioSSatuan = new Audio(ssatuan);

      audioNomor_Antrian.play();
      if(ratus>0){
        audioNomor_Antrian.onended = function(){
          audioSRatus.play()  
        };
        audioSRatus.onended = function(){
          audioRatus.play();
        };

        if(puluh>0){
          audioRatus.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

          if(satuan>0){
            audioPuluh.onended = function(){
              audioSSatuan.play();
            };
          }

        }else if(belas>10 && belas<20){
          audioRatus.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

        }else{
          audioRatus.onended = function(){
            audioSSatuan.play();
          };

        }

      }else{
        if(puluh>0){
          audioNomor_Antrian.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

          if(satuan>0){
            audioPuluh.onended = function(){
              audioSSatuan.play();
            };
          }

        }else if(belas>10 && belas<20){
          audioNomor_Antrian.onended = function(){
            audioSPuluh.play();
          };
          audioSPuluh.onended = function(){
            audioPuluh.play();
          };

        }else{
          audioNomor_Antrian.onended = function(){
            audioSSatuan.play();
          };

        }

      } 

    }}